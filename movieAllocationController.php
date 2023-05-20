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
                $movie_id = $row['movie_id'];

                // Add movie, allocated cinema room, and image link to the array
                $movieAllocations[$movie_name] = array(
                    'room_id' => $room_id,
                    'image' => $image,
                    'movie_name' => $movie_name,
                    'movie_id' => $movie_id
                );
            }
            //  var_dump($movieAllocations);
            return $movieAllocations;
        } else {
            // Query execution failed
            echo "Error: " . mysqli_error($this->conn); // Output the error message
            return false;
        }
    }

    public function updateCinemaRoom($roomid, $movie)
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

    function generateMovieAllocationForm($movieAllocations)
    {
        // $output = '<form method="post">';
        $output = '<div class="container">';
        $counter = 0;

        foreach ($movieAllocations as $movie => $data) {

            // var_dump($movie);
            $output .= '<div class="item">';
            $output .= '<img src="' . $data['image'] . '" alt="' . $movie . '">';
            // $output .= "<div style='display:block;'>";
            $output .= '<div class="dropdown1" style="margin-top:20px;">';
            $output .= '<select name="cinema[' . $data['movie_name'] . ']">';

            for ($i = 1; $i <= 6; $i++) {
                $roomName = "Cinema $i";
                $selected = ($data['room_id'] == $i) ? "selected" : "";
                $output .= "<option value='$i' id='room_id' $selected>$roomName</option>";
            }

            $output .= '</select>';

            $output .= '<select name="session[' . $data['movie_id'] . ']">';

            $sessionTimings = array("00:00:00", "11:00:00", "12:00:00", "13:00:00", "14:00:00", "15:00:00", "16:00:00");

            $sessionsRetrieved = $this->retrieveSessions($data['movie_id']);



            if ($sessionsRetrieved) {
                foreach ($sessionsRetrieved as $session) {
                    foreach ($sessionTimings as $timing) {
                        $selectedTime = ($session['sessionMovieTime'] == $timing) ? "selected" : "";
                        $output .= "<option value='$timing' id='' $selectedTime>$timing</option>";
                        // var_dump($session['sessionMovieTime'] . " " . $data['movie_id']);
                    }
                }

            } else {
                foreach ($sessionTimings as $timing) {
                    var_dump($timing);
                    $output .= "<option value='$timing' id=''>$timing</option>";
                    
                }
            }


            $output .= '</select>';
            $output .= ' <input type="hidden" id="movie_id" name="movie_id" value="' . $data['movie_id'] . '">';
            // $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';



            $counter++;
        }

        return $output;
    }

    function retrieveSessions($movieId)
    {
        // Fetch movie and allocated cinema room data from the database
        $query = "SELECT * FROM movie_session WHERE movie_session_movieId = $movieId";
        $result = mysqli_query($this->conn, $query);

        // Check if query executed successfully
        if ($result) {
            // Create an associative array to store movie and allocated cinema room data
            $movieSessions = array();

            // Fetch data row by row
            while ($row = mysqli_fetch_assoc($result)) {
                $sessionId = $row['movie_session_id'];
                $sessionRoomId = $row['movie_session_roomId'];
                $sessionMovieId = $row['movie_session_movieId'];
                $sessionMovieTime = $row['movie_session_time'];

                // Add movie, allocated cinema room, and image link to the array
                $movieSessions[$sessionId] = array(
                    'sessionId' => $sessionId,
                    'sessionRoomId' => $sessionRoomId,
                    'sessionMovieId' => $sessionMovieId,
                    'sessionMovieTime' => $sessionMovieTime
                );
            }
            return $movieSessions;
        } else {
            // Query execution failed
            echo "Error: " . mysqli_error($this->conn); // Output the error message
            return false;
        }

    }

    public function validateSession($roomId, $movieId, $sessions)
    {
        $sessionRoomId = $roomId;
        $movieSessionTiming = $sessions; //this is the timing
        $sessionMovieId = $movieId;
        $outputSession = "";
        $updSessionResult = null;
        $retExistingSession = "SELECT * FROM movie_session WHERE movie_session_roomId = '$sessionRoomId' AND movie_session_time = '$movieSessionTiming'";
        // var_dump($retExistingSession);
        $retExtSessionResult = mysqli_query($this->conn, $retExistingSession);
        // var_dump(mysqli_num_rows($retExtSessionResult));
        if (mysqli_num_rows($retExtSessionResult) > 1) {
            $outputSession .= '<script>alert("Conflicting Sessions' . $sessionMovieId . '")</script>';
        } else {
            //check if statement should be adding or updating 
            $retSession = "SELECT * FROM movie_session WHERE movie_session_movieId = '$movieId'"; //this movie id you will need to retrieve hidden input box
            $retSessionResult = mysqli_query($this->conn, $retSession);
            if ($retSessionResult) {
                $addUpdSession = "UPDATE movie_session SET movie_session_time = '$movieSessionTiming', movie_session_roomId='$sessionRoomId' WHERE movie_session_movieId = '$sessionMovieId'";
            } else {
                $addUpdSession = "INSERT INTO movie_session(movie_session_roomId, movie_session_movieId, movie_session_time)";
                $addUpdSession .= "VALUES('$sessionRoomId', '$sessionMovieId', '$movieSessionTiming')";
                //$movieSessionTiming here should be the $_POST one 
            }
            // var_dump($addUpdSession);
            $updSessionResult = mysqli_query($this->conn, $addUpdSession);

            if ($updSessionResult) {
                $outputSession .= '<script>alert("Successfully updated for ' . $sessionMovieId . '")</script>';
            } else {
                $outputSession .= '<script>alert("Failed for ' . $sessionMovieId . '")</script>';
            }

        }

        echo ($outputSession);
        if ($updSessionResult != null) {
            return true;
        }
        else{
            return false;
        }
    }
}
?>