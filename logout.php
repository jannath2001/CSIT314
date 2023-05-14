<?php
session_start(); // Initialize the session
session_unset(); // Unset all of the session variables
session_destroy(); // Destroy the session
header("location: index.php"); // Redirect to the index page after logout
exit();
?>