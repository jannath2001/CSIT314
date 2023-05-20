<?php
include("DBTicketBooking.php");
include("navbar.php");
include("viewBookingController.php");

// Create an instance of the BookingController class and pass the database connection.
$bookingController = new viewBookingController($conn);

// Get the user_id in the session
$user_id = $_SESSION['user_id'];

if ($user_id) {
  $userBookings = $bookingController->getBookingsByUserId($user_id);
  if (isset($_POST['rate'], $_COOKIE['selectedID'])){
    $booking_id = (int) $_COOKIE['selectedID'];
    $rating = (int) $_POST['rate'][$booking_id];
    $userRating = $bookingController -> addRatings($rating,$booking_id);
  }

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
        background-color: blue;
        /* Fill colour */
        color: white;
        /* Text color for header */
      }
      
      .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
      }

      .rate:not(:checked) > input {
        position: absolute;
        top: -9999px;
      }

      .rate:not(:checked) > label {
        float: right;
        width: 1.5rem;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
      }

      .rate:not(:checked) > label:before {
        content: '★ ';
      }

      .rate > input:checked ~ label {
        color: #FFC700;
      }

      .rate:not(:checked) > label:hover,
      .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
      }
      
      .rate > input:checked + label:hover,
      .rate > input:checked + label:hover ~ label,
      .rate > input:checked ~ label:hover,
      .rate > input:checked ~label:hover ~ label,
      .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
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
          <th>Movie ID</th>
          <th>Ticket ID</th>
          <th>Room ID</th>
          <th>Date</th>
          <th>Location</th>
          <th>Time</th>
          <th>Number of Ticket</th>
          <th>Seat Number</th>
          <th>Submit Ratings</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($userBookings as $booking) { ?>
          <tr>
            <td>
              <?php echo $booking['booking_id']; ?>
            </td>
            <td>
              <?php echo $booking['movie_id']; ?>
            </td>
            <td>
              <?php echo $booking['ticket_id']; ?>
            </td>
            <td>
              <?php echo $booking['room_id']; ?>
            </td>
            <td>
              <?php echo $booking['Date']; ?>
            </td>
            <td>
              <?php echo $booking['location']; ?>
            </td>
            <td>
              <?php echo $booking['time']; ?>
            </td>
            <td>
              <?php echo $booking['num_of_ticket']; ?>
            </td>
            <td>
              <?php echo $booking['seat_num']; ?>
            </td>
            <td><form method="post" onsubmit="onSelect(this)"><div class="rate">
            <input type="radio" id="<?php echo "star5" . $booking['booking_id'] ?>" name="<?php echo "rate[" . $booking['booking_id'] . "]"?>" value=5 <?php echo $booking['review'] == 5 ? 'checked' : '' ?>>     
            <label for="<?php echo "star5" . $booking['booking_id'] ?>" title="text">5 stars</label>
            <input type="radio" id="<?php echo "star4" . $booking['booking_id'] ?>" name="<?php echo "rate[" . $booking['booking_id'] . "]"?>" value=4 <?php echo $booking['review'] == 4 ? 'checked' : '' ?>>
            <label for="<?php echo "star4" . $booking['booking_id'] ?>" title="text">4 stars</label>
            <input type="radio" id="<?php echo "star3" . $booking['booking_id'] ?>" name="<?php echo "rate[" . $booking['booking_id'] . "]"?>" value=3 <?php echo $booking['review'] == 3 ? 'checked' : '' ?>>
            <label for="<?php echo "star3" . $booking['booking_id'] ?>" title="text">3 stars</label>
            <input type="radio" id="<?php echo "star2" . $booking['booking_id'] ?>" name="<?php echo "rate[" . $booking['booking_id'] . "]"?>" value=2 <?php echo $booking['review'] == 2 ? 'checked' : '' ?>>
            <label for="<?php echo "star2" . $booking['booking_id'] ?>" title="text">2 stars</label>
            <input type="radio" id="<?php echo "star1" . $booking['booking_id'] ?>" name="<?php echo "rate[" . $booking['booking_id'] . "]"?>" value=1 <?php echo $booking['review'] == 1 ? 'checked' : '' ?>>
            <label for="<?php echo "star1" . $booking['booking_id'] ?>" title="text">1 stars</label>
            <input type="hidden" id="bookingID" name="<?php echo 'booking[' . $booking['booking_id'] . ']'?>" value=<?php echo $booking['booking_id']?>>
            </div>
            <div>              
            <input style = "margin-left: 10px; border:none; border-radius:5px; background-color:#5D3FD3;" name="review" type="submit" value= "Confirm ratings">
            </div>
            </form></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </body>
  <script>
    function onSelect(e) {
      var bookingID = e.elements.namedItem("bookingID");
      document.cookie = "selectedID=" + bookingID.value;
    }
  </script>
  </html>

  <?php
} else {
  // Handle the case when user_id is not found
  echo "User ID not found.";
}
?>