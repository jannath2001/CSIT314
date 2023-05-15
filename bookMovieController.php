<?php
include("DBTicketBooking.php");
class BookMovieController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getMovieById($movieId)
    {
        $sql = "SELECT * FROM movies WHERE movie_id = $movieId";
        $result = mysqli_query($this->conn, $sql);
        $movie = mysqli_fetch_assoc($result);

        return $movie;
    }

    public function createBooking($movieId, $location, $schedule, $seat)
    {
        $sql = "INSERT INTO bookings (movie_id, location, schedule, seat) VALUES ($movieId, '$location', '$schedule', '$seat')";
        mysqli_query($this->conn, $sql);

        return mysqli_insert_id($this->conn);
    }

    public function retrieveInformation($movieId)
    {
        $sql = "SELECT * FROM movies_display WHERE movie_id = $movieId";
        $result = mysqli_query($this->conn, $sql);
        $movie = mysqli_fetch_assoc($result);

        return $movie;

    }

}
?>