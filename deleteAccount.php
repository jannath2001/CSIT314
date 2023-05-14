<?php
include("DBTicketBooking.php");
include("deleteAccountController.php");

// create a new instance of the account deleter
$deleters = new deleteAccountController($conn);

// check if the menu id is set in the post data
if (isset($_POST['user_id'])) {
    // call the deleteMenu method to delete the movie
    $deleters->deleteAccount($_POST['user_id']);
}

// redirect back to the editAccount page
header("Location: editUserAccount.php");
exit();