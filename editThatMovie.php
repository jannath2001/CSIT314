<?php
include("DBTicketBooking.php"); // include the database connection file
include("navBar.php");
include("editThatMovieController.php");


$movieEditController = new movieUpdateController($conn);
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

    </style>

</head>

<body>
    <div class="header">
        <h2>Edit Movies</h2>
    </div>

    <div class="table-container">
    <?php
    if (isset($_GET['movie_id'])) {
        $id = $_GET['movie_id'];
        $result = $movieEditController->editMovieDetails($id);

        if ($result) {
            if (isset($_POST['update'])) {
                // Get the updated data from the form
                $updatedData = $_POST;
    
                // Call the updateMovieDetails method
                $movieEditController->updateMovieDetails($id, $updatedData);
            }
    
        ?>

        <div class=table-body>
        <form action="editThatMovie.php?movie_id=<?php echo $id; ?>" method="POST">

                <div class="mb-3">
                    <label for="movie_name">Movie name:</label>
                    <input type="text" name="movie_name" value="<?=$result['movie_name'] ?>" placeholder="Enter the Movie" Required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="availability">availability:</label>
                    <select name="availability">
                        <?php
                        // check the availability status and set the selected option accordingly
                        if($result['availability'] == "Available") {
                            echo '<option name="Availability" value="Available" selected>Available</option>';
                            echo '<option name="Availability" value="Not Available">Not Available</option>';
                        } else {
                            echo '<option name="Availability" value="Available">Available</option>';
                        }
                            ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price">Price:</label>
                    <input type="number" name="price" value="<?=$result['price'] ?>" placeholder="Enter the Price" Required>
                </div>

                <div class="mb-3">
                    <label for="format">Format:</label>
                    <input type="text" name="format" value="<?=$result['format'] ?>" placeholder="Enter the format" Required>
                </div>

                <div class="mb-3">
                    <label for="rating">Rating:</label>
                    <input type="number" name="rating" value="<?=$result['rating'] ?>" placeholder="Enter the rating" Required>
                </div>

                <div class="mb-3">
                    <label for="genre">Genre:</label>
                    <input type="text" name="genre" value="<?=$result['genre'] ?>" placeholder="Enter the genre" Required>
                </div>

                <div class="mb-3">
                    <label for="duration">Duration:</label>
                    <input type="text" name="duration" value="<?=$result['duration'] ?>" placeholder="Enter the duration" Required>
                </div>

                <div class="mb-3">
                    <label for="age_rating">Age rating:</label>
                    <input type="text" name="age_rating" value="<?=$result['age_rating'] ?>" placeholder="Enter the age rating" Required>
                </div>

                <div class="mb-3">
                    <label for="subtitle">Subtitle:</label>
                    <select name="subtitle">
        <        <?php
                if ($result['subtitle'] == "chinese") {
                    echo '<option name="subtitle" value="chinese" selected>Chinese</option>';
                    echo '<option name="subtitle" value="english">English</option>';
                } else if ($result['subtitle'] == "english") {
                    echo '<option name="subtitle" value="chinese">Chinese</option>';
                    echo '<option name="subtitle" value="english" selected>English</option>';
                } else {
                    echo '<option name="subtitle" value="chinese">Chinese</option>';
                    echo '<option name="subtitle" value="english">English</option>';
                }
                ?>
                </select>
                </div>

                <div class="mb-3">
                    <label for="MovieSynopsis">Movie Synopsis:</label>
                    <input type="text" name="MovieSynopsis" value="<?=$result['MovieSynopsis'] ?>" placeholder="Enter Movie Synopsis" Required>
                </div>


                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="text" name="image" value="<?=$result['image'] ?>" placeholder="Enter the image" Required>
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
    <?php include("footer.php");?>
</body>

</html>
                        