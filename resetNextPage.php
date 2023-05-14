<?php

include("DBTicketBooking.php"); // include the database connection file
include("resetNextPageController.php");
include("navBar.php");

$passwordEditController = new passwordUpdateController($conn);
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="homestylesheet.css"/>    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

        .alert{
            position:fixed;
            bottom:30px;
            justify-content: center;
            

        }

    </style>

</head>

<body>
    <div class="header">
        <h2>Reset Password</h2>
    </div>

    <div class="table-container">
    <?php
    if (isset($_GET['email'])) {
        $id = $_GET['email'];
        $result = $passwordEditController->editPasswordDetails($id);
    
        if ($result) {
            if (isset($_POST['reset'])) {
                // Get the updated data from the form
                $updatedData = $_POST;
                if ($updatedData['password'] !== $updatedData['cfmPassword']) {
                    echo "<div class='alert' role='alert'>New password and confirm password do not match.</div>";
                } else {
                    $passwordEditController->updatePasswordDetails($id, $updatedData);
                }
                }
            
    
            // Output the form
            ?>
            <div class="table-body">
                <form action="resetNextPage.php?email=<?php echo $id ?>" method="POST">
              
                <div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?=$result['email'] ?>" placeholder="Enter the Movie" Required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">New password:</label>
                        <input type="password" name="password" placeholder="Enter new password" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="cfmPassword">Confirm Password:</label>
                        <input type="password" name="cfmPassword" placeholder="Enter password again" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="reset" value="reset" class="btn btn-primary">Reset Password</button>
                    </div>
                </form>
            </div>
            <?php
        } else {
            echo "<h4>No record found</h4>";
        }
    } else {
        echo "<h4>Something went wrong</h4>";
       
    }
    