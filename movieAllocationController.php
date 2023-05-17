<?php
include("DBTicketBooking.php");
// include("navBar.php");


class movieAllocationController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getMovieAllocations()
    {
        // Fetch movie and allocated cinema room data from the database
        $query = "SELECT * FROM movies";
        $result = mysqli_query($this->conn, $query);

        // Check if query executed successfully
        if ($result) {
            // Create an associative array to store movie and allocated cinema room data
            $movieAllocations = array();

            // Fetch data row by row
            while ($row = mysqli_fetch_assoc($result)) {
                $movie_name = $row['movie_name'];
                $image = $row['image'];
                $room_id = $row['room_id'];

                // Add movie, allocated cinema room, and image link to the array
                $movieAllocations[$movie_name] = array(
                    'room_id' => $room_id,
                    'image' => $image,
                    'movie_name' => $movie_name
                );
            }

            return $movieAllocations;
        } else {
            // Query execution failed
            echo "Error: " . mysqli_error($this->conn); // Output the error message
            return false;
        }
    }

    public function updateCinemaRoom($roomid,$movie)
    {
        $room_id = $roomid;
        $movie_name = $movie;

        // Update the cinema room for the movie in the database
        $query = "UPDATE movies SET room_id = '$room_id' WHERE movie_name = '$movie_name'";
        $result = mysqli_query($this->conn, $query);

        // Check if the query executed successfully
        if ($result) {
            // Update successful
            return true;
        } else {
            // Update failed
            echo "Error: " . mysqli_error($this->conn); // Output the error message
            return false;
        }

    }

    function generateMovieAllocationForm($movieAllocations) {
        // $output = '<form method="post">';
        $output = '<div class="container">';
        $counter = 0;
    
        foreach ($movieAllocations as $movie => $data) {
            // if ($counter % 3 === 0) {
            //     $output .= '<div class="row">';
            // }
    
            $output .= '<div class="item">';
            $output .= '<img src="' . $data['image'] . '" alt="' . $movie . '">';
            $output .= '<div class="dropdown1" style="margin-top:20px;">';
            $output .= '<select name="cinema[' . $data['movie_name'] . ']">';
    
            for ($i = 1; $i <= 6; $i++) {
                $roomName = "Cinema $i";
                $selected = ($data['room_id'] == $i) ? "selected" : "";
                $output .= "<option value='$i' id='room_id' $selected>$roomName</option>";
            }
    
            $output .= '</select>';
            $output .= '</div>';
            $output .= '</div>';
    
            // if ($counter % 3 === 2 || $counter === count($movieAllocations) - 1) {
            //     $output .= '</div>';
            // }
    
            $counter++;
        }
    
        // $output .= '<button type="submit" name="submit" value="submit" class="submit-button">Submit</button>';
        // $output .= '</form>';
        // $output .= '</div>';
    
        return $output;
    }
}
?>