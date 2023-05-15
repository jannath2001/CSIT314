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
}
