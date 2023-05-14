<?php
include("DBTicketBooking.php");



class passwordUpdateController
{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function editPasswordDetails($email) {
        $email = mysqli_real_escape_string($this->conn, $email);
    
        $sql = "SELECT * FROM login WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);
    
        if (!$result) {
            die("Error: " . mysqli_error($this->conn));
        }
    
        $passwordDetails = mysqli_fetch_assoc($result);
        
        return $passwordDetails;
    }

    public function updatePasswordDetails($email, $updatedData) {
        $email = mysqli_real_escape_string($this->conn, $email);
        
        // Extract the updated values from $updatedData array
        $password = mysqli_real_escape_string($this->conn, $updatedData['password']);
        
    
        // Construct the SQL query to update the movie details
        $sql = "UPDATE login SET password = '$password' WHERE email = '$email'";
        
        // Execute the update query
        $result = mysqli_query($this->conn, $sql);
        
        if (!$result) {
            die("Error: " . mysqli_error($this->conn));
        }
        
        // Assuming the update is successful
        header("Location: login.php?email=" . $email);
        exit();
    }
}

class FormValidator {
    private $errors = array();

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function validatePasswords($password, $cfmPassword) {
        if ($password !== $cfmPassword) {
            $this->errors[] = "New password and confirm password fields must match.";
        }

        if (strlen($password) < 8) {
            $this->errors[] = "New password must be at least 8 characters long.";
        }

        return $this->errors;
    }
}
