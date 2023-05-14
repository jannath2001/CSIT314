<?php
class deleteRewardController {
    private $conn;
    
    // Get the connection
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function deleteReward($reward_id) {
        $sql = "DELETE FROM rewards WHERE reward_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $reward_id);
        $stmt->execute();
    }
}