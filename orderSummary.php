<?php
// Required to start every time passing of data with session is required
session_start();
include("DBTicketBooking.php");
include("checkoutController.php");
include("orderSummaryController.php");

$checkoutController = new CheckOutController($conn);
$orderSummary = new orderSummaryController($conn);
$checkOutMenu = '';
$image1 = '';
$num_of_ticket = 0;
$ticketType = "";
$seats = "";
$room_id = "";
$location = "";
$qty = 0;
$_SESSION['reward_Amount'] = null;

if (isset($_SESSION['movie_id'], $_POST['totalPrice'])) {
  $menu_item = $_SESSION['menu_item'];
  $checkOutMenu = $checkoutController->get_menuItems($menu_item);

  $movie_items = $_SESSION["movie_id"];
  $checkOutMovies = $checkoutController->get_movieItems($movie_items);

  $movie_name = $checkOutMovies['movie_name'];
  $image1 = $checkOutMovies['image'];
  $price1 = $checkOutMovies['price'];

  $seats = $_SESSION['seats'];
  $room_id = $_SESSION['room_id'];
  $total = $_POST['totalPrice'];
  $date = isset($_SESSION["date"]) ? $_SESSION["date"] : "";
  $timing = isset($_SESSION["time"]) ? $_SESSION["time"] : "";
  $date = date("Y-m-d", strtotime($date));
  $ticketType = $_SESSION["ticketType"];
  $location = $_SESSION["location"];
  $num_of_ticket = count($seats);
  $movie_id = $_SESSION["movie_id"];
  $user_id = $_SESSION['user_id'];
  $qty = $_POST["quantity"];
  
  $checkoutController->updateLoyaltyPoints($total);
  $ticket_id = $orderSummary->addTicket($user_id, $seats, $movie_id, $room_id, $total, $date, $timing, $ticketType, $location, $num_of_ticket);
  // var_dump($ticket_id);
  if ($ticket_id !== false) {
    $orderSummary->addBooking($user_id, $movie_id, $ticket_id, $room_id, $date, $timing, $location, $num_of_ticket, $seats);
  } else {
    echo ("Error Adding to Bookings");
  }
} elseif (isset($_POST['totalPrice'])) {
  $menu_item = $_SESSION['menu_item'];
  $checkOutMenu = $checkoutController->get_menuItems($menu_item);
  $total = $_POST['totalPrice'];


  $qty = $_POST["quantity"];
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Order Summary</title>
  <style>
    body {
      background-color: #000;
      color: #ccc;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      text-align: center;
    }

    .summary-box {
      background-color: #ccc;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      color: #000;
      font-size: 140%;
    }

    h1 {
      color: #fff;
      margin-bottom: 20px;
      font-size: 200%;
      /* Increased font size */
    }

    .summary {
      text-align: left;
      margin-bottom: 20px;
      font-size: 140%;
    }

    .summary-item {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .summary-item img {
      width: 20px;
      height: 20px;
      margin-right: 10px;
    }

    .button {
      background-color: #4CAF50;
      border: none;
      color: #fff;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 140%;
      margin-top: 20px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Confirm Booking</h1>

    <div class="summary-box">
      <div class="summary">

        <div class="summary-item">
          <?php if (!empty($image1) && $num_of_ticket && $ticketType): ?>
            <img src="<?php echo $image1 ?>" alt="Logo" width="100px">
            <span style="color: #000;">
              <?php echo $num_of_ticket ?> x
              <?php echo $ticketType ?> ticket
            </span>
          <?php endif; ?>
        </div>

        <div class="summary-item">
          <?php if (!empty($date)): ?>
            <span style="color: #000;">Date:
              <?php echo $date ?>
            </span>
          <?php endif; ?>
        </div>

        <div class="summary-item">
          <?php if (!empty($timing)): ?>
            <span style="color: #000;">ShowTime:
              <?php echo $timing ?>
            </span>
          <?php endif; ?>
        </div>

        <div class="summary-item">
          <?php if (!empty($location)): ?>
            <span style="color: #000;">Location:
              <?php echo $location ?>
            </span>
          <?php endif; ?>
        </div>

        <div class="summary-item">
          <?php if (!empty($seats)): ?>
            <span style="color: #000;">Seats:
              <?php echo is_array($seats) ? implode(', ', $seats) : ''; ?>
            </span>
          <?php endif; ?>
        </div>

        <div class="summary-item">
          <?php if (!empty($room_id)): ?>
            <span style="color: #000;">Cinema Room:
              <?php echo $room_id ?>
            </span>
          <?php endif; ?>
        </div>


        <div class="summary-item"></div>

        <?php
        if (is_array($checkOutMenu)) {
          foreach ($checkOutMenu as $index => $check) {
            $item_names = $check["item_name"];
            $price = $check["price"];
            $image = $check["image"];

            ?>

            <div class="summary-item">
              <img src=<?php echo $image ?> alt="Popcorn Icon">
              <span style="color: #000;">
                <?php echo $qty ?> x
                <?php echo $item_names ?>
              </span>

              <!-- <span style="color: #000;">1 x popcorn</span> -->
            </div>
            <?php
          }
        }
        mysqli_close($conn);
        ?>
        <div class="summary-item">
          <span style="color: #000;">Total Price: $
            <?php echo isset($total) ? $total : ''; ?>
          </span>
        </div>

      </div>
      <form action="index.php">
      <button class="button" id="emailButton">Return to home</button>
      </form>
    </div>
  </div>

  <script>
    function sendData(e) {
      e.addEventListener('click', () => {
        const summaryText = document.body.innerText;
        const emailBody = encodeURIComponent(summaryText);
        const emailAddress = 'user@example.com'; // Change this to the recipient's email address
        const mailtoLink = `mailto:${emailAddress}?subject=Order Summary&body=${emailBody}`;
      });
    }
  </script>
</body>

</html>