<?php
include("DBTicketBooking.php");
class addMovieController {
    public $conn;

    // Get the connection
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Load the room id from room table
    public function getRoomIds() {
        $sql = "SELECT room_id FROM room";
        $result = $this->conn->query($sql);
        $roomIds = array();
        while ($row = $result->fetch_assoc()) {
            $roomIds[] = $row;
        }
        return $roomIds;
    }


    // Method to add a movie to the database
    public function addMovie($room_id, $availability, $price, $format, $rating, $movie_name, $genre, $duration, $age_rating, $subtitle,
    $MovieSynopsis,$image) {
        // Prepare the insert statement
        $stmt = $this->conn->prepare("INSERT INTO movies (room_id, availability, price, format, rating, movie_name , genre, duration, 
        age_rating, subtitle, MovieSynopsis, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("isisississss", $room_id, $availability, $price, $format, $rating, $movie_name, $genre, $duration, $age_rating, $subtitle,
        $MovieSynopsis,$image);

        // Execute the statement
        if ($stmt->execute()) {
            // Movie added successfully
            return true;
        } else {
            // Error occurred while adding movie
            return false;
        }
    }
}

?>