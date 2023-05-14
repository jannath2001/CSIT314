<?php
include("DBTicketBooking.php");

class accountUpdateController {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function editAccountDetails($account_id) {
        $accountId = mysqli_real_escape_string($this->conn, $account_id);

        $sql = "SELECT * FROM login WHERE user_id = '$accountId'";
        $result = mysqli_query($this->conn, $sql);
    
        if (!$result) {
            die("Error: " . mysqli_error($this->conn));
        }
    
        $menuDetails = mysqli_fetch_assoc($result);
        
        return $menuDetails;
    }
    

    public function updateAccountDetails($account_id, $updatedData) {
        $accountId = mysqli_real_escape_string($this->conn, $account_id);
        
        // Extract the updated values from $updatedData array
        $accountId = mysqli_real_escape_string($this->conn, $updatedData['user_id']);
        $email = mysqli_real_escape_string($this->conn, $updatedData['email']);
        $password = mysqli_real_escape_string($this->conn, $updatedData['password']);
        $userType = mysqli_real_escape_string($this->conn, $updatedData['user_type']);
    
        // Construct the SQL query to update the menu details
        $sql = "UPDATE login SET user_id = '$accountId', email = '$email', password = '$password', user_type = '$userType' WHERE user_id = '$accountId'";
        
        // Execute the update query
        $result = mysqli_query($this->conn, $sql);
        
        if (!$result) {
            die("Error: " . mysqli_error($this->conn));
        }
        
        // Assuming the update is successful
        header("Location: editUserAccount.php?user_id=" . $accountId);
        exit();
    }
}
?>
