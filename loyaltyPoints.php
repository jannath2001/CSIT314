<?php
session_start();

class Loyalty
{
    public static function getLoyaltyPoints()
    {
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];

            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "db_ticketbooking");
            if (!$conn) {
                die("Failed to connect to database.");
            }

            // Retrieve the user_id from the database based on the email
            $query = "SELECT user_id FROM login WHERE email = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            
            // Fetch the user_id
            mysqli_stmt_bind_result($stmt, $user_id);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
            
            // Retrieve the loyalty points from the loyalty_member table based on the user_id
            $query = "SELECT points FROM loyalty_member WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            mysqli_stmt_execute($stmt);
            
            // Fetch the loyalty points
            mysqli_stmt_bind_result($stmt, $loyalty_points);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            mysqli_close($conn);
            
            if ($loyalty_points !== null) {
                return $loyalty_points;
            } else {
                return 0; // Return 0 if loyalty points are not found
            }
        } else {
            return 0; // Return 0 if email is not set in session
        }
    }
}
?>
