<?php
include("DBTicketBooking.php");

class rewardUpdateController {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function editRewardDetails($reward_id) {
        $rewardId = mysqli_real_escape_string($this->conn, $reward_id);

        $sql = "SELECT * FROM rewards WHERE reward_id = '$rewardId'";
        $result = mysqli_query($this->conn, $sql);
    
        if (!$result) {
            die("Error: " . mysqli_error($this->conn));
        }
    
        $rewardDetails = mysqli_fetch_assoc($result);
        
        return $rewardDetails;
    }
    

    public function updateRewardDetails($rewardId, $updatedData) {
        $menuId = mysqli_real_escape_string($this->conn, $rewardId);
        
        // Extract the updated values from $updatedData array
        $reward_name = mysqli_real_escape_string($this->conn, $updatedData['item_name']);
        $description = mysqli_real_escape_string($this->conn, $updatedData['description']);
        $image = mysqli_real_escape_string($this->conn, $updatedData['image']);
        $reward_Point = mysqli_real_escape_string($this->conn, $updatedData['reward_Point']);
        $rewardAmount = mysqli_real_escape_string($this->conn, $updatedData['rewardAmount']);
    
        // Construct the SQL query to update the menu details
        $sql = "UPDATE rewards SET reward_name = '$reward_name', description = '$description', image = '$image', reward_Point = '$reward_Point', rewardAmount = '$rewardAmount' 
        WHERE reward_id = '$rewardId'";
        
        // Execute the update query
        $result = mysqli_query($this->conn, $sql);
        
        if (!$result) {
            die("Error: " . mysqli_error($this->conn));
        }
        
        // Assuming the update is successful
        header("Location: editRewards.php?reward_id=" . $rewardId);
        exit();
    }
}
?>
