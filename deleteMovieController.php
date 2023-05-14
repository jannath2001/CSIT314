<?php
class deleteMovieController {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function deleteMovie($movie_id) {
        $sql = "DELETE FROM movies WHERE movie_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $movie_id);
        $stmt->execute();
    }
}