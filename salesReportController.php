<?php
include("DBTicketBooking.php");

class salesReport{

    private $conn;

    public function __construct($conn)
    {
      $this->conn = $conn;
    }

    public function getDataMonthly(){
        $query = "SELECT DAY(date) AS day FROM movies_ticket";
        $result = mysqli_query($this->conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['day'];
        }
    
        return null;        

    }

    public function getDataWeekly(){
        $query = "SELECT DAY(date) AS day FROM movies_ticket LIMIT 7";
        $result = mysqli_query($this->conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['day'];
        }
    
        return null;
    }

    function getDayFromDate() {
        $query = "SELECT DAY(date) AS day FROM movies_ticket LIMIT 1";
        $result = mysqli_query($this->conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['day'];
        }
    
        return null;
    }

    
}

?>
