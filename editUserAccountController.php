<?php

// include the database connection file
include("DBTicketBooking.php");

// define the controller class
class accountController
{
    // define a method to get all movies from the database
    public function getAllAccount($conn)
    {
        // create an empty array to hold the movie data
        $account = array();

        // fetch the movie data from the database
        $sql = "SELECT * FROM login";
        $result = mysqli_query($conn, $sql);

        // loop through the result set and add each movie to the array
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $account[] = $row;
            }
        }

        // close the database connection
        $conn->close();

        // return the array of movies
        return $account;
    }

}

?>