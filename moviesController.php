<?php
include("DBTicketBooking.php");


class MovieController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getMovies()
    {
        $movies = array();

        $sql = "SELECT * FROM movies";
        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $movies[] = $row;
            }
        }

        return $movies;
    }

    function getMovieDetails($movieId) {
    
        $sql2 = "SELECT * FROM movies_display WHERE movie_id = $movieId";
        $result2 = mysqli_query($this->conn, $sql2);
        $movie = mysqli_fetch_assoc($result2);
    
        return $movie;
      }
}
