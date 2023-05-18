<?php
include("DBTicketBooking.php");

class ratingController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getRating() {
        $query = "SELECT user_id, movie_id, review FROM booking";
        $result = mysqli_query($this->conn, $query);
    
        $ratings = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $rating = array(
                "user_id" => $row['user_id'],
                "movie_id" => $row['movie_id'],
                "review" => $row['review']
            );
            $ratings[] = $rating;
        }
    
        return $ratings;
    }
    

 

    
    
    
    
    
    
    
    
    
    


}