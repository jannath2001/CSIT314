<?php
include("DBTicketBooking.php");
include("addMovieController.php");
include("navBar.php");
include("footer.php");


// Create an object of addMovieController class
$addMovieController = new addMovieController($conn);
$roomIds = $addMovieController->getRoomIds();

if (isset($_POST['addMovieButton'])) {
    // Get the form data
    $room_id = $_POST['room_id'];
    $availability = $_POST['availability'];
    $price = $_POST['price'];
    $format = $_POST['format'];
    $rating = $_POST['rating'];
    $movie_name = $_POST['movie_name'];
    $image = $_POST['image'];


     // Call addMovie function of the addMovieController object to add the movie to the database
     if ($addMovieController->addMovie($room_id, $availability, $price, $format, $rating, $movie_name, $image)) {
        // Redirect to a success page
        header("Location: editMovie.php");
        exit();
    } else {
        // Error occurred while adding movie
        echo "Error occurred while adding movie: " . mysqli_error($addMovieController->conn);
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
            margin-left: 550px;
            margin-top: 100px;
        }

        form {
            width: 600px;
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
            text-align: right;
            margin-right: 20px;
            font-weight: bold;
        }

        input[type=text],
        input[type=number] {
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
    </style>
</head>

<body>
    <h1>Add a Movie</h1>
    <div class="container">


        <form action="addMovie.php" method="POST">
            <label for="room_id">Room ID:</label>
            <select name="room_id" required>
                <?php foreach ($roomIds as $room) { ?>
                    <option value="<?php echo $room['room_id']; ?>"><?php echo $room['room_id']; ?></option>
                <?php } ?>
            </select>
            <br><br>

            <label for="availability">Movie Status:</label>
            <select name="availability">
                <option name="availability" value="Available">Available</option>
                <option name="availability" value="Unavailable">Unavailable</option>
            </select>
            <br><br>
            <label for="price">Price:</label>
            <input type="number" step="1.0" name="price" placeholder="Enter the price" required>
            <br><br>
            <label for="format">Enter the Movie's format:</label>
            <input type="text" name="format" placeholder="Enter the format">
            <br><br>
            <label for="rating">Enter the Movie's rating:</label>
            <input type="number" step="1.0" name="rating" placeholder="Enter the Movie's rating">
            <br><br>
            <label for="movie_name">Enter the Name of Movie:</label>
            <input type="text" name="movie_name" placeholder="Enter the Name of Movie">
            <br><br>
            <label for="image">Enter the image link:</label>
            <input type="text" name="image" placeholder="Enter the image link">
            <br><br>
            <button type="submit" name="addMovieButton" value="addMovieButton">Add the Movie</button>
            <button type="submit" name="backToEditButton" value="backToEditButton">Back to Edit Movie</button>
        </form>
    </div>
</body>

</html>