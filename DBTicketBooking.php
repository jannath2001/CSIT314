<?php
//Connect to database
$conn = mysqli_connect("localhost", "root", "", "db_ticketbooking");
if (!$conn) {
  die("Failed to connect to database.");
}

?>