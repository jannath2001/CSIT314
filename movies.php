<!-- Start the Session -->
<?php
session_start();

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
      height:500px;      
      margin: 20px;
      padding: 10px 10px 30px 10px;
      background-color: #333;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255,255,255,0.5);
      text-align: center;
    }
    .item img {
      width: 100%;
      height: 100%;     
      object-fit: cover;
      object-position: center;
    }
  
		
  </style>
</head>
<html>
 <head>
    <link rel="stylesheet" href="homestylesheet.css"/> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head> 

<!-- Start of content -->
    <!-- Setting background and header of page -->
    <body style="background-color:black">
    <br/><br/><br/>
    <h1>Movies</h1>
    <div class="container">


    <?php
    //Retrieve movie data from database
    $sql = "SELECT * FROM movies";
    $result = mysqli_query($conn, $sql);

    //Display movie data if available
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $movie_id = $row['movie_id'];
        $movie_name = $row['movie_name'];
        $availability = $row['availability'];
        $price = $row['price'];
        $rating = $row['rating'];
        $format = $row['format'];
        $image = $row['image'];
    ?>

    <div class="item">
        <img src="<?php echo $image ?>" alt="<?php echo $movie_name ?>">
        <!-- <h2><?php echo $movie_name ?></h2>
        <p>Status: <?php echo $availability ?></p>
        <p>Price: $<?php echo $price ?></p>
        <p>Rating: <?php echo $rating ?>/10</p>
        <p>Format: <?php echo $format ?></p> -->
        <input type="number" id="number4" min="0" max ="50" step="1" placeholder="SELECT"> 
        <input style = "width:20%;" type = "text" value =$<?php echo $price ?> disabled>        
        <button onclick="window.location.href='bookings.php?id=<?php echo $movie_id ?>'">Book Now</button>
      </div>
    <?php
        }
      } else {
        echo "No movies available.";
      }

      //Close database connection
      mysqli_close($conn);
    ?>
    </div>


	<!--footer------------->
	<div class="box4">
                <div class="column">
                  <br/>
                  <select style ="background-color: grey;" name="lang" id="lang">
                    <option value="En">English</option>          
                  </select>
                </div>
                <div class="column">
                  <h3>NAVIGATION</h3>
                  <p>Home</p>
                  <p>FAQ</p>
                  <p>Investor Relations</p>
                  <p>Jobs</p>
                  <p>About Us</p>
                  <p>Help Centre</p>
                </div>
                <div class="column">
                  <h3>LEGAL</h3>
                  <p>Privacy Policy</p>
                  <p>Terms of Service</p>
                  <p>Cookie Preferences</p>
                  <p>Corporate Information</p>
                </div>
                <div class="column">
                  <h3>TALK TO US</h3>
                  <p>jannath99@gmail.com</p>
                  <p>+65 9376 8735 </p>
                </div>
                <div class="column">
                  <h3>Follow us</h3>
                  <i style ="color:white;" class="fa fa-instagram"></i>
                  <i style ="color:white;" class="fa fa-facebook"></i>
                  <i style ="color:white;" class="fa fa-twitter"></i>
          <pre style="font-size: 10px; color:white;">      
          <i class="fa fa-copyright"></i>2023 oatmilk. All Rights Reserved
                  </pre>
                </div>                  
              </body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>