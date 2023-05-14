<?php
include("DBTicketBooking.php");
include("deleteMovieController.php");
//include("navBar.php");

// create a new instance of the movie deleter
$deleter = new deleteMovieController($conn);

// check if the movie id is set in the post data
if (isset($_POST['movie_id'])) {
    // call the deleteMovie method to delete the movie
    $deleter->deleteMovie($_POST['movie_id']);
}

// redirect back to the showMovies page
header("Location: editMovie.php");
exit();
