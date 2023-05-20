<?php
include("DBTicketBooking.php");

class addAccountController {
    public $conn;

    // Get the connection
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to validate the password
    public function validatePassword($password) {
        $errors = [];

        if (strlen($password) < 8 || strlen($password) > 16) {
            $errors[] = "Password should be minimum 8 characters and maximum 16 characters";
        }
        if (!preg_match("/\d/", $password)) {
            $errors[] = "Password should contain at least one digit";
        }
        if (!preg_match("/[A-Z]/", $password)) {
            $errors[] = "Password should contain at least one capital letter";
        }
        if (!preg_match("/[a-z]/", $password)) {
            $errors[] = "Password should contain at least one lowercase letter";
        }
        if (!preg_match("/\W/", $password)) {
            $errors[] = "Password should contain at least one special character";
        }
        if (preg_match("/\s/", $password)) {
            $errors[] = "Password should not contain any whitespace";
        }

        return $errors;
    }

    // Method to add an account to the database
    public function addAccount($email, $password, $user_type) {
        // Validate the password
        $passwordErrors = $this->validatePassword($password);

        if (!empty($passwordErrors)) {
            foreach ($passwordErrors as $error) {
                echo $error . "\n";
            }
            return false;
        }

        // Prepare the insert statement
        $stmt = $this->conn->prepare("INSERT INTO login (email, password, user_type) VALUES (?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("sss", $email, $password, $user_type);

        // Execute the statement
        if ($stmt->execute()) {
            // Account added successfully
            return true;
        } else {
            // Error occurred while adding the account
            return false;
        }
    }
}
?>