<?php
include("DBTicketBooking.php");
class addRewardController {
    public $conn;

    // Get the connection
    public function __construct($conn) {
        $this->conn = $conn;
    }


    // Method to add a menu to the database
    public function addReward($reward_name, $description, $image, $reward_Point, $rewardAmount) {
        // Prepare the insert statement
        $stmt = $this->conn->prepare("INSERT INTO rewards (reward_name, description, image, reward_Point, rewardAmount) VALUES (?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("sssii", $reward_name, $description, $image, $reward_Point, $rewardAmount);

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