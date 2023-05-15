<?php
session_start();
include("DBTicketBooking.php");
include("navbar.php");
include("viewBookingController.php");

// Create an instance of the BookingController class and pass the database connection.
$bookingController = new viewBookingController($conn);

// Get the user_id based on the email in the session
$email = $_SESSION['email'];
$userId = $bookingController->getUserIdByEmail($email);

if ($userId) {
  // Call the getBookingsByUserId() method to retrieve the bookings of the user.
  $userBookings = $bookingController->getBookingsByUserId($userId);
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="homestylesheet.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    body {
      background-color: black;
      color: white;
    }

    .header {
      text-align: center;
      margin-top: 100px;
    }

    .booking-table {
      width: 100%;
      margin-top: 20px;
    }

    .booking-table th,
    .booking-table td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .booking-table th {
      background-color: blue; /* Fill colour */
      color: white; /* Text color for header */
    }
  </style>
</head>

<body>
  <div class="header">
    <h2>Your Movie Bookings</h2>
  </div>

  <table class="booking-table">
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Movie</th>
        <th>Ticket ID</th>
        <th>Location</th>
        <th>Seat Number</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($userBookings as $booking) { ?>
        <tr>
          <td><?php echo $booking['booking_id']; ?></td>
          <td><?php echo $booking['movie_name']; ?></td>
          <td><?php echo $booking['ticket_id']; ?></td>
          <td><?php echo $booking['location']; ?></td>
          <td><?php echo $booking['seat']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  

</body>

</html>

<?php
} else {
  // Handle the case when user_id is not found
  echo "User ID not found.";
}
?>
