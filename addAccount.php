<?php
include("DBTicketBooking.php");
include("addAccountController.php");
// include("navBar.php");
include("footer.php");

// Create an object of addAccountController class
$addAccountController = new addAccountController($conn);

// Initialize an empty array for storing password errors
$passwordErrors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    // Validate the password
    $passwordErrors = $addAccountController->validatePassword($password);

    if (empty($passwordErrors)) {
        // Call addAccount function of the addAccountController object to add the account to the database
        if ($addAccountController->addAccount($email, $password, $user_type)) {
            // Redirect to a success page
            header("Location: editUserAccount.php");
            exit();
        } else {
            // Error occurred while adding account
            $passwordErrors[] = "Error occurred while adding account: " . mysqli_error($addAccountController->conn);
        }
    }
}
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
        }

        h1 {
            color: white;
            margin-left: 500px;
            margin-top: 100px;
        }


        form {
            width: 550px;
            margin: 0 auto;
            font-size: 16px;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;

        }

        label {
            display: inline-block;
            width: 150px;
            text-align: left;
            margin-right: 10px;
            font-weight: bold;
        }

        input[type=text],
        input[type=number] {
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 155px;
        }

        button[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type=submit]:hover {
            background-color: #3e8e41;
        }

        .w3-button {
            margin-top: 10px;
            margin-right: 10px;
        }

        .container {
            margin-top: 60px;
        }

        .add-movie-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .add-movie-button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: black;
        }
    </style>
</head>

<body>
    <h1>Add a Account</h1>
    <div class="container">


        <form action="addAccount.php" method="POST">


        <!-- <label for="user_id">Enter the User ID:</label>
            <input type="number" name="user_id" placeholder="Enter the User ID:"> -->
            <br><br>
            <label for="email">Enter Email:</label>
            <input type="text" name="email" placeholder="Enter email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="text" name="password" placeholder="Enter password" required>
            <br><br>
            <label for="user_type">Select User type:</label>
            <select name="user_type">
                <option name="user_type" value="loyaltyMember">loyaltyMember</option>
                <option name="user_type" value="staff">staff</option>
                <option name="user_type" value="manager">manager</option>
                <option name="user_type" value="systemAdmin">systemAdmin</option>
            </select>
            <br><br>

            <!-- Display password errors within the form -->
            <?php if (!empty($passwordErrors)): ?>
                <div class="error-container">
                    <?php foreach ($passwordErrors as $error): ?>
                        <p class="error-message"><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <button type="submit" name="addAccountButton" value="addAccountButton">Add the account</button>
            <a href="editUserAccount.php" class="add-Account-button">Back to Edit Account</a>

        </form>
    </div>
</body>

</html>

