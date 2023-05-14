<?php
class deleteMenuController {
    private $conn;
    
    // Get the connection
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function deleteMenu($menu_id) {
        $sql = "DELETE FROM food_beverage WHERE menu_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $menu_id);
        $stmt->execute();
    }
}