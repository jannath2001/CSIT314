<?php
include("DBTicketBooking.php");

class salesController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getTotalDaily() {
        $query = "SELECT date, SUM(total) AS total FROM movie_ticket GROUP BY date";
        $result = mysqli_query($this->conn, $query);
    
        $dailyTotals = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $dailyTotal = array(
                "date" => $row['date'],
                "total" => $row['total']
            );
            $dailyTotals[] = $dailyTotal;
        }
    
        return $dailyTotals;
    }

    public function getTotalWeekly() {
        $query = "SELECT date_add(date, interval  -WEEKDAY(date) day) as 'First Date',
                  date_add(date_add(date, interval  -WEEKDAY(date)-1 day), interval 7 day) as 'Second Date',
                  sum(total) as 'total' from movie_ticket
                  GROUP BY WEEK(date)";
    
        $result = mysqli_query($this->conn, $query);
    
        $weeklyTotals = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $weeklyTotal = array(
                "first_date" => $row['First Date'],
                "second_date" => $row['Second Date'],
                "total" => $row['total']
            );
            $weeklyTotals[] = $weeklyTotal;
        }
    
        return $weeklyTotals;
    }

    public function getTotalMonthly() {
        $query = "SELECT MONTHNAME(date) AS 'MONTH',
                  SUM(total) AS 'total'
                  FROM movie_ticket
                  GROUP BY MONTH(date)";
    
        $result = mysqli_query($this->conn, $query);
    
        $monthlyTotals = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $monthlyTotal = array(
                "month" => $row['MONTH'],
                "total" => $row['total']
            );
            $monthlyTotals[] = $monthlyTotal;
        }
    
        return $monthlyTotals;
    }
    
    
    
    
    
    
    
    
    


}