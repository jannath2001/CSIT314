<?php
include("DBTicketBooking.php");
class addAccountController {
    public $conn;

    // Get the connection
    public function __construct($conn) {
        $this->conn = $conn;
    }


    // Method to add a menu to the database
    public function addAccount($user_id, $email, $password, $user_type) {
        // Prepare the insert statement
        $stmt = $this->conn->prepare("INSERT INTO login (user_id, email, password, user_type) VALUES (?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("isss", $user_id, $email, $password, $user_type);

        // Execute the statement
        if ($stmt->execute()) {
            // Menu added successfully
            return true;
        } else {
            // Error occurred while adding menu
            return false;
        }
    }
}
?>