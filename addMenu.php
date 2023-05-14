<?php
include("DBTicketBooking.php");
include("addMenuController.php");
include("navBar.php");

// Create an object of addMenuController class
$addMenuController = new addMenuController($conn);

if (isset($_POST['addMenuButton'])) {
    // Get the form data
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];


    // Call addMovie function of the addMovieController object to add the movie to the database
    if ($addMenuController->addMenu($item_name, $description, $price, $image)) {
        // Redirect to a success page
        header("Location: editMenu.php");
        exit();
    } else {
        // Error occurred while adding movie
        echo "Error occurred while adding menu: " . mysqli_error($addMenuController->conn);
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
    <h1>Add a Menu</h1>
    <div class="container">


        <form action="addMenu.php" method="POST">


        <label for="item_name">Enter the name of Food/Beverage:</label>
            <input type="text" name="item_name" placeholder="Enter the name of Food/Beverage">
            <br><br>
            <label for="description">Enter the Description of the Food/Beverage:</label>
            <input type="text" name="description" placeholder="Enter the Description of the Food/Beverage">
            <br><br>
            <label for="price">Price:</label>
            <input type="number" step="1.0" name="price" placeholder="Enter the price" required>
            <br><br>
            <label for="image">Enter the image link:</label>
            <input type="text" name="image" placeholder="Enter the image link">
            <br><br>
            <button type="submit" name="addMenuButton" value="addMenuButton">Add the item to Menu</button>
            <a href="editMenu.php" class="add-food&beverage-button">Back to Edit Menu</a>

        </form>
    </div>
</body>

</html>