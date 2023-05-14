<?php
include("DBTicketBooking.php");
include("navBar.php");
include("footer.php");
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
      width: 300px;
      margin: 20px;
      padding: 20px;
      background-color: #333;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255,255,255,0.5);
      text-align: center;
    }
    .item img {
      width: 80%;
      height: 70%;     
      object-fit: cover;
      object-position: center;
    }
    .item h2 {
      font-size: 24px;
      margin-bottom: 10px;
    }
       
        h2 {
            margin-top: 50px;
            color:white;
        }
		
  </style>
    <link rel="stylesheet" href="homestylesheet.css"/> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head> 
 
 <!--navigation-------------->
    
          
	<!--content------------->
  
<body style = "background-color:black">
  <br/><br/><br/>
  <h1>Rewards</h1>
  <div class="container">

  <?php
  //retrieve rewards from database
  $sql = "SELECT * FROM rewards";
  $result = mysqli_query($conn,$sql);
  //Display Rewards data if available
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $reward_id = $row['reward_id'];
      $reward_name = $row['reward_name'];
      $description = $row['description'];
      $image = $row['image'];
  
      ?>
      <div class="item">
        <img src="<?php echo $image ?>" alt="<?php echo $reward_name ?>">
        <h2 style ="color:white;"><?php echo $reward_name ?></h2> 
        <p><?php echo $description ?></p>     
        <button>Redeem</button>
      </div>
      <?php
    }
  } else {
    echo "No promotions available.";
  }
  

  
      //Close database connection
      mysqli_close($conn);
    ?>
  </div>
	</body>
</html>


