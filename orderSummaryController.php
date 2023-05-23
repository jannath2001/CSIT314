<?php
include("DBTicketBooking.php");

class orderSummaryController
{

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    function get_movieItems($movie_items)
    {
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

    public function addTicket($user_id, $seats, $movie_id, $room_id, $total, $date, $timing, $ticketType, $location, $num_of_ticket)
    {
        // Convert seat_num array to a string
        $seat_num_str = implode(', ', $seats);

        $stmt = $this->conn->prepare("INSERT INTO movie_ticket (user_id, seat_num, movie_id, room_id, total, date, 
        time, ticketType, location, num_of_ticket) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("issiissssi", $user_id, $seat_num_str, $movie_id, $room_id, $total, $date, 
        $timing, $ticketType, $location, $num_of_ticket);

        // Execute the statement
        if ($stmt->execute()) {
            // Retrieve the generated ticket_id
            $ticket_id = $stmt->insert_id;
            // Ticket added successfully
            return $ticket_id;
        } else {
            // Error occurred while adding ticket
            return false;
        }
    }


    public function addBooking($user_id, $movie_id, $ticket_id, $room_id, $date, $timing, $location, $num_of_ticket, $seats)
    {
        // Convert seat_num array to a string
        $seat_num_str = implode(', ', $seats);

        $stmt = $this->conn->prepare("INSERT INTO booking (user_id, movie_id, ticket_id, room_id, date, time, location, num_of_ticket, seat_num) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("iiiisssis", $user_id, $movie_id, $ticket_id, $room_id, $date, $timing, $location, $num_of_ticket, $seat_num_str);

        // Execute the statement
        if ($stmt->execute()) {
            // Ticket added successfully
            return true;
        } else {
            // Error occurred while adding ticket
            return false;
        }
    }
}
?>