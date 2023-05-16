<?php
include("DBTicketBooking.php");



class MenuController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getMenu()
    {
        //Retrieve movie data from database
        $food = array();
        $sql = "SELECT * FROM food_beverage";
        $result = mysqli_query($this->conn, $sql);

    //Display movie data if available
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $food[]=$row;
      }
    }
    return $food;
}
}
      