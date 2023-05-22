<?php
include("DBTicketBooking.php");

class CheckOutController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    function get_menuItems($menu_items)
    {
        if (is_array($menu_items) && !empty($menu_items)) {
            $query = "SELECT * FROM food_beverage WHERE menu_id IN (" . implode(",", $menu_items) . ")";
            $result = mysqli_query($this->conn, $query);
    
            $items = array();
    
            while ($row = mysqli_fetch_assoc($result)) {
                $item = array(
                    "menu_id" => $row['menu_id'],
                    "item_name" => $row['item_name'],
                    "description" => $row['description'],
                    "price" => $row['price'],
                    "image" => $row['image']
                );
                $items[] = $item;
            }
    
            return $items;
        }
    
        return array();
    }

    function get_movieItems($movieId)
    {

        $sql2 = "SELECT * FROM movies WHERE movie_id = $movieId";
        $result2 = mysqli_query($this->conn, $sql2);
        $movie = mysqli_fetch_assoc($result2);

        return $movie;
    }

    function processCheckout($seats, $selectedMovieId, $roomID, $totalFood, $dateTime, $ticketID, $userID)
    {
        // Do SQL Insertion for tickets
        foreach ($seats as &$seat) {
            $insertTicket = "INSERT INTO movie_ticket(seat_num,movie_id,room_id,foodTotal,dateTime)
                         VALUES($seat,$selectedMovieId,$roomID,$totalFood,$dateTime)";
            // Perform insertion
        }

        // Do SQL Insertion for booking
        $insertBooking = "INSERT INTO booking(movie_id,ticket_id,user_id)
                      VALUES($selectedMovieId, $ticketID,$userID)";
        // Perform insertion

        // Update Room to reflect the correct number of seats left
        $length = count($seats);
        $updateRoom = "UPDATE Room
                   SET num_of_seat = num_of_seat - $length
                   WHERE room_id = $roomID";
        // Perform update
    }

    public function updateLoyaltyPoints($loyaltyPoints)
    {
        $userId = $_SESSION['user_id'];

        if ($loyaltyPoints > 0){
            $selectQuery = "SELECT points FROM loyalty_member WHERE user_id = ?";
            $selectStatement = $this->conn->prepare($selectQuery);
            $selectStatement->bind_param("i", $userId);
            $selectStatement->execute();
    
            // Bind the result to $currentPoints
            $currentPoints = 0;
            $selectStatement->bind_result($currentPoints);
            $selectStatement->fetch();
            $selectStatement->close();
    
            // Calculate updated loyalty points
            $updatedPoints = $currentPoints + $loyaltyPoints;
    
            // Update the user's loyalty points in the database
            $updateQuery = "UPDATE loyalty_member SET points = ? WHERE user_id = ?";
            $updateStatement = $this->conn->prepare($updateQuery);
            $updateStatement->bind_param("ii", $updatedPoints, $userId);
            $updateStatement->execute();
            $updateStatement->close();
        }
    }
}