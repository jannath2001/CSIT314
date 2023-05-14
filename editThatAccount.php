<?php
include("DBTicketBooking.php");
include("editThatAccountController.php");
include("navBar.php");
include("footer.php");

$accountEditController = new accountUpdateController($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="homestylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .header {
            text-align: center;
            margin-top: 100px;
        }

        body {
            background-color: black;
            color: white;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body>
    <div class="header">
        <h2>Edit Accounts</h2>
    </div>

    <div class="table-container">
    <?php
    if (isset($_GET['user_id'])) {
        $id = $_GET['user_id'];
        $result = $accountEditController->editAccountDetails($id);

        if ($result) {
            if (isset($_POST['update'])) {
                // Get the updated data from the form
                $updatedData = $_POST;
    
                // Call the updateMenuDetails method
                $accountEditController->updateAccountDetails($id, $updatedData);
            }
    
        ?>



        <div class=table-body>
            <form action="editThatAccount.php?user_id=<?php echo $_GET['user_id']; ?>" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">

                <div class="mb-3">
                    <label for="user_id">User ID:</label>
                    <input type="number" name="user_id" value="<?= $result['user_id'] ?>" placeholder="Enter the ID"
                        Required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="text" name="email" value="<?= $result['email'] ?>"
                        placeholder="Enter the email" Required>
                </div>

                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input type="text" name="password" value="<?= $result['password'] ?>" placeholder="Enter the password"
                        Required>
                </div>


                <div class="mb-3">
                <label for="user_type">Select User type:</label>
            <select name="user_type">
                <option name="user_type" value="loyaltyMember">loyaltyMember</option>
                <option name="user_type" value="staff">staff</option>
                <option name="user_type" value="manager">manager</option>
                <option name="user_type" value="systemAdmin">systemAdmin</option>
            </select>
                </div>

                <div class="mb-3">
                    <button type="submit" name="update" value="update">Update</button>

                </div>
            </form>

            <?php
           
        }
        else
        {
            echo "<h4>No record Found</h4>";
        }
    }
    else
    {
        echo "<h4>Something went wrong</h4>";
    }
    ?>
        </div>
    </div>
</body>

</html>