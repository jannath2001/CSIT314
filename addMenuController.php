<?php
include("DBTicketBooking.php");
class addMenuController {
    public $conn;

    // Get the connection
    public function __construct($conn) {
        $this->conn = $conn;
    }


    // Method to add a menu to the database
    public function addMenu($item_name, $description, $price, $image) {
        // Prepare the insert statement
        $stmt = $this->conn->prepare("INSERT INTO food_beverage (item_name, description, price, image) VALUES (?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("ssds", $item_name, $description, $price, $image);

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