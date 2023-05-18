<?php
include("DBTicketBooking.php");
include("addRewardController.php");
include("navBar.php");
include("footer.php");

// Create an object of addMenuController class
$addRewardController = new addRewardController($conn);

if (isset($_POST['addRewardButton'])) {
    // Get the form data
    $reward_name = $_POST['reward_name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $reward_Point = $_POST['reward_Point'];
    $rewardAmount = $_POST['rewardAmount'];


    // Call addReward function of the addMovieController object to add the movie to the database
    if ($addRewardController->addReward($reward_name, $description, $image, $reward_Point,$rewardAmount)) {
        // Redirect to a success page
        header("Location: editRewards.php");
        exit();
    } else {
        // Error occurred while adding reward
        echo "Error occurred while adding menu: " . mysqli_error($addRewardController->conn);
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
    </style>
</head>

<body>
    <h1>Add a Reward</h1>
    <div class="container">


        <form action="addReward.php" method="POST">


        <label for="item_name">Enter the name of Reward:</label>
            <input type="text" name="reward_name" placeholder="Enter the name of Reward">
            <br><br>
            <label for="description">Enter the Description of the Reward:</label>
            <input type="text" name="description" placeholder="Enter the Description of the Food/Beverage">
            <br><br>
            <label for="image">Enter the image link:</label>
            <input type="text" name="image" placeholder="Enter the image link">
            <br><br>
            <label for="reward_Point">Enter the points needed to redeem reward:</label>
            <input type="number" name="reward_Point" placeholder="Enter the points needed to redeem reward">
            <br><br>
            <label for="rewardAmount">Enter reward amount:</label>
            <input type="number" name="rewardAmount" placeholder="Enter reward amount">
            <br><br>
            <button type="submit" name="addRewardButton" value="addRewardButton">Add the item to Menu</button>
            <a href="editRewards.php" class="add-reward-button">Back to Edit Menu</a>

        </form>
    </div>
</body>

</html>