<?php
class deleteAccountController {
    private $conn;
    
    // Get the connection
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function deleteAccount($user_id) {
        $sql = "DELETE FROM login WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
    }
}