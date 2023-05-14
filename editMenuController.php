<?php

// include the database connection file
include("DBTicketBooking.php");

// define the controller class
class MenuController
{
    // define a method to get all movies from the database
    public function getAllFood($conn)
    {
        // create an empty array to hold the movie data
        $food_beverage = array();

        // fetch the movie data from the database
        $sql = "SELECT * FROM food_beverage";
        $result = mysqli_query($conn, $sql);

        // loop through the result set and add each movie to the array
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $food_beverage[] = $row;
            }
        }

        // close the database connection
        $conn->close();

        // return the array of movies
        return $food_beverage;
    }
}

?>