<?php
// Retrieve the data sent from the client-side
$data = json_decode(file_get_contents('php://input'), true);

// Extract the values from the data
$location = $data['location'];
$movie = $data['movie'];
$showtime = $data['showtime'];

// Perform necessary actions with the data (e.g., save it to a database)

// Send a response back to the client
$response = ['message' => 'Data saved successfully'];
header('Content-Type: application/json');
echo json_encode($response);
?>

<?php
// Retrieve the data sent from JavaScript
$location = $_POST['location'];
$movie = $_POST['movie'];
$showtime = $_POST['showtime'];

// Perform any necessary database operations or data processing here

// Redirect the user to another page
header("Location: other_page.php");
exit;
?>
