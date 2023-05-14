<?php
include("DBTicketBooking.php");
include("deleteRewardController.php");

// create a new instance of the menu deleter
$deleters = new deleteRewardController($conn);

// check if the menu id is set in the post data
if (isset($_POST['reward_id'])) {
    // call the deleteMenu method to delete the movie
    $deleters->deleteReward($_POST['reward_id']);
}

// redirect back to the editMenu page
header("Location: editRewards.php");
exit();