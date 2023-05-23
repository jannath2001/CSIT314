<?php
session_start();
include("DBTicketBooking.php");
include("promotionsController.php");
include("navBar.php");


$controller = new RewardsController($conn); // Instantiate the controller
$rewards = $controller->displayRewards(); // Call the displayRewards() method


if (isset($_POST['redeem'])) {
  $reward_Point = $_POST['reward_Point'];
  $_SESSION['reward_Amount'] = $_POST['rewardAmount'];
  $controller->redeemRewards($reward_Point);
}
?>


<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      background-color: black;
      color: white;
      font-family: Arial, sans-serif;
      font-size: 18px;
      line-height: 1.5;
    }

    h1 {
      font-size: 36px;
      margin-top: 50px;
      margin-bottom: 30px;
      text-align: center;
      text-transform: uppercase;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 50px;
    }

    .item {
      width: 350px;
      height:200px;
      margin: 20px;
      padding: 20px;
      background-color: #333;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
      text-align: center;
    }

    .item img {
      width: 100%;
      height: 70%;
      object-fit: cover;
      object-position: cover;
    }

    .item h2 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    h2 {
      margin-top: 50px;
      color: white;
    }
  </style>
  <link rel="stylesheet" href="homestylesheet.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!--navigation-------------->


<!--content------------->

<body style="background-color: black;">
  <br /><br /><br />
  <h1>Promotions</h1>
  <div class="container">


    <?php
    // Display rewards data if available
    if (!empty($rewards)) {
      foreach ($rewards as $reward) {
        $reward_id = $reward['reward_id'];
        $reward_name = $reward['reward_name'];
        $description = $reward['description'];
        $reward_Point = $reward['reward_Point'];
        $image = $reward['image'];
        $rewardAmount = $reward['rewardAmount'];
        ?>
    <div class="item">
      <img src="<?php echo $image ?>" alt="<?php echo $reward_name ?>">
      <h2 style="color:white;">
        <?php echo $reward_name ?>
      </h2>
      <p>
        <?php echo $description ?>
      </p>
      <form method="post" action="promotions.php">
        <input type="hidden" name="reward_Point" value="<?php echo $reward_Point ?>">
        <input type="hidden" name="rewardAmount" value="<?php echo $rewardAmount ?>">
        <button type="submit" name="redeem">Redeem</button>
      </form>
    </div>
    <?php
      }
    } else {
      echo "No promotions available.";
    }
    ?>

<?php include("footer.php");?>

</body>

</html>