<?php
include("DBTicketBooking.php");

class menuUpdateController {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function editMenuDetails($menu_id) {
        $menuId = mysqli_real_escape_string($this->conn, $menu_id);

        $sql = "SELECT * FROM food_beverage WHERE menu_id = '$menuId'";
        $result = mysqli_query($this->conn, $sql);
    
        if (!$result) {
            die("Error: " . mysqli_error($this->conn));
        }
    
        $menuDetails = mysqli_fetch_assoc($result);
        
        return $menuDetails;
    }
    

    public function updateMenuDetails($menuId, $updatedData) {
        $menuId = mysqli_real_escape_string($this->conn, $menuId);
        
        // Extract the updated values from $updatedData array
        $item_name = mysqli_real_escape_string($this->conn, $updatedData['item_name']);
        $description = mysqli_real_escape_string($this->conn, $updatedData['description']);
        $price = mysqli_real_escape_string($this->conn, $updatedData['price']);
        $image = mysqli_real_escape_string($this->conn, $updatedData['image']);
    
        // Construct the SQL query to update the menu details
        $sql = "UPDATE food_beverage SET item_name = '$item_name', description = '$description', price = '$price', image = '$image' WHERE menu_id = '$menuId'";
        
        // Execute the update query
        $result = mysqli_query($this->conn, $sql);
        
        if (!$result) {
            die("Error: " . mysqli_error($this->conn));
        }
        
        // Assuming the update is successful
        header("Location: editMenu.php?menu_id=" . $menuId);
        exit();
    }
}
?>
