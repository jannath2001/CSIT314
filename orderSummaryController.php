<?php
include("DBTicketBooking.php");

class CheckOutController
{

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    function get_movieItems($movie_items){
        $query = "SELECT * FROM movie_ticket
         WHERE ticket_id IN (" . implode(",", $movie_items) . ")";
        $result3 = mysqli_query($this->conn, $query);
    
        $item4 = array();
        while ($row = mysqli_fetch_assoc($result3)) {
            $item1 = array(
                "ticket_id" => $row['ticket_id'],
                "seat_num" => $row['seat_num'],
                "movie_id" => $row['movie_id'],
                "room_id" => $row['room_id'],
                "dateTime" => $row['dateTime'],
                "ticketType" => $row['ticketType'],
                "location" => $row['location'],
                "num_of_ticket" => $row['num_of_ticket'],
            );
            $items4[] = $item1;
        }
    
    
    }

   
}
?>