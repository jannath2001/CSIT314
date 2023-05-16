<?php
include("DBTicketBooking.php");
// include("navBar.php");


class movieUpdateController
{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function editMovieDetails($movieId) {
        $movieId = mysqli_real_escape_string($this->conn, $movieId);
    
        $sql = "SELECT * FROM movies WHERE movie_id = '$movieId'";
        $result = mysqli_query($this->conn, $sql);
    
        if (!$result) {
            die("Error: " . mysqli_error($this->conn));
        }
    
        $movieDetails = mysqli_fetch_assoc($result);
        
        return $movieDetails;
    }
    public function updateMovieDetails($movieId, $updatedData) {
        $movieId = mysqli_real_escape_string($this->conn, $movieId);
    
        // Extract the updated values from $updatedData array
        $movieName = mysqli_real_escape_string($this->conn, $updatedData['movie_name']);
        $availability = mysqli_real_escape_string($this->conn, $updatedData['availability']);
        $price = mysqli_real_escape_string($this->conn, $updatedData['price']);
        $format = mysqli_real_escape_string($this->conn, $updatedData['format']);
        $rating = mysqli_real_escape_string($this->conn, $updatedData['rating']);
        $genre = mysqli_real_escape_string($this->conn, $updatedData['genre']);
        $duration = mysqli_real_escape_string($this->conn, $updatedData['duration']);
        $age_rating = mysqli_real_escape_string($this->conn, $updatedData['age_rating']);
        $subtitle = mysqli_real_escape_string($this->conn, $updatedData['subtitle']);
        $MovieSynopsis = mysqli_real_escape_string($this->conn, $updatedData['MovieSynopsis']);
        $image = mysqli_real_escape_string($this->conn, $updatedData['image']);
    
        // Construct the SQL query to update the movie details
        $sql = "UPDATE movies SET movie_name = '$movieName', availability = '$availability', 
        price = '$price', format = '$format', rating = '$rating', genre = '$genre', duration = '$duration', 
        age_rating = '$age_rating', subtitle = '$subtitle', MovieSynopsis = '$MovieSynopsis', image = '$image' WHERE movie_id = '$movieId'";
    
        // Execute the update query
        $result = mysqli_query($this->conn, $sql);
    
        if (!$result) {
            die("Error: " . mysqli_error($this->conn));
        }
    
        // Assuming the update is successful
        header("Location: editMovie.php?movie_id=" . $movieId);
        exit();
    }
    
}

