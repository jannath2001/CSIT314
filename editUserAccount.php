<?php
include("DBTicketBooking.php");
include("editUserAccountController.php");
include("navBar.php");
include("footer.php");


// create a new instance of the movie controller
$accountController = new accountController();

// call the getAllMovies method to retrieve the movie data
$account = $accountController->getAllAccount($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="homestylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background-color: black;
            color: white;
        }

        .header {
            text-align: center;
            margin-top: 100px;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }

        table {
            border-collapse: collapse;
            border: 1px solid black;
            padding: 4px;
            cellspacing: 50px;
        }

        th,
        td {
            border: 2px solid white;
            padding: 8px;
            text-align: center;
        }

        .edit {
            display: inline-block;
            padding: 10px 20px;
            background-color: #5D3FD3;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        .delete{
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFFFFF;
            color: black;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
    </style>
    

</head>


<body>
<div class="header">
        <h2>Displaying All accounts</h2>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($account as $acc): ?>
                    <tr>
                        <td>
                            <?php echo $acc['user_id']; ?>
                        </td>
                        <td>
                            <?php echo $acc['email']; ?>
                        </td>
                        <td>
                            <?php echo $acc['password']; ?>
                        </td>
                        <td>
                            <?php echo $acc['user_type']; ?>
                        </td>
                        <td>
                        <!-- Edit movie button -->
                        <?php if (isset($acc['user_id'])): ?>
                            <a href="editThatAccount.php?user_id=<?php echo $acc['user_id']; ?>" class="edit">Edit</a>
                        <?php endif; ?>

                        <!-- Delete movie button -->
                        <form method="post" action="deleteAccount.php">
                            <input type="hidden" name="user_id" value="<?php echo $acc['user_id']; ?>">
                            <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this account?')">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Add menu Button-->
        <div class="add-Account-container">
            <a href="addAccount.php" class="add-account-button">Add account</a>
        </div>
    </div>
</body>

</html>