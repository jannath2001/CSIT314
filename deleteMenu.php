<?php
include("DBTicketBooking.php");
include("deleteMenuController.php");

// create a new instance of the menu deleter
$deleter = new deleteMenuController($conn);

// check if the menu id is set in the post data
if (isset($_POST['menu_id'])) {
    // call the deleteMenu method to delete the movie
    $deleter->deleteMenu($_POST['menu_id']);
}

// redirect back to the editMenu page
header("Location: editMenu.php");
exit();