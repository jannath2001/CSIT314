<?php
include("DBTicketBooking.php");
include("navBar.php");

if(isset($_POST['enter'])) {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM login WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 0) {
        // email is not present in database
        echo "Email not found";
    } else {
        // email is present in database, proceed to next page
        header("Location: resetNextPage.php?email=".$email);
        exit();
    }
}


?>

<!-- rest of HTML code goes here -->


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
        <h2>Please enter your email</h2>
    </div>

    <div class="table-container">
        <div class=table-body>
            <form action="resetPassword.php" method="POST">
               

                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="text" name="email"  placeholder="Enter your email"
                        Required class="form-control">
                </div>

                <div class="mb-3">
                    <button type="submit" name="enter" value="enter">Enter</button>

                </div>

              
            </form>
        </div>
    </div>
</body>

</html>

