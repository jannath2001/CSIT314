<?php
include("DBTicketBooking.php");
include("navBar.php");
include("editMovieController.php");



// create a new instance of the movie controller
$movieController = new MovieController();

// call the getAllMovies method to retrieve the movie data
$movies = $movieController->getAllMovies($conn);
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

       .add-movie-container{       
            display: inline-block;
            padding: 5px;
            background-color: #5D3FD3;            
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top:10px;
            margin-left:965px;
            
             
       }

       .add-movie-container:hover{       
            
            background-color: green; 
            
            
             
       }

      

    </style>
    

</head>


<body>
<div class="header">
        <h2>Displaying All Movies</h2>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Movie ID</th>
                    <th>Movie Name</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Format</th>
                    <th>Rating</th>
                    <th>Genre</th>
                    <th>Duration</th>
                    <th>Age rating</th>
                    <th>Subtitle</th>
                    <th>Movie Synopsis</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td>
                            <?php echo $movie['movie_id']; ?>
                        </td>
                        <td>
                            <?php echo $movie['movie_name']; ?>
                        </td>
                        <td>
                            <?php echo $movie['availability']; ?>
                        </td>
                        <td>
                            <?php echo $movie['price']; ?>
                        </td>
                        <td>
                            <?php echo $movie['format']; ?>
                        </td>
                        <td>
                            <?php echo $movie['rating']; ?>
                        </td>
                        <td>
                            <?php echo $movie['genre']; ?>
                        </td>
                        <td>
                            <?php echo $movie['duration']; ?>
                        </td>
                        <td>
                            <?php echo $movie['age_rating']; ?>
                        </td>
                        <td>
                            <?php echo $movie['subtitle']; ?>
                        </td>
                        <td>
                            <?php echo $movie['MovieSynopsis']; ?>
                        </td>
                        <td>
                            <?php echo $movie['image']; ?>
                        </td>
                        <td>
                        <!-- Edit movie button -->
                        <a href="editThatMovie.php?movie_id=<?php echo $movie['movie_id']; ?>" class="edit">Edit</a>


                        <!-- Delete movie button -->
                        <form method="post" action="deleteMovie.php">
                            <input type="hidden" name="movie_id" value="<?php echo $movie['movie_id']; ?>">
                            <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <!-- Add Movie Button-->
        <div class="add-movie-container">
            <a href="addMovie.php" class="add-movie-button" style = "color:white; text-decoration: none;">Add Movie</a>
        </div>
        <?php include("footer.php");?>
    
</body>

</html>

