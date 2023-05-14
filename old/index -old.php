<?php
session_start();
var_dump($_SESSION);

//Connect to database
$conn = mysqli_connect("localhost", "root", "", "db_ticketbooking");
if (!$conn) {
  die("Failed to connect to database.");
}
?>


<!DOCTYPE html>
<html>
 <head>
    <link rel="stylesheet" href="homestylesheet.css"/>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head> 
 
<?php
if (isset($_SESSION['email'], $_SESSION['password'])) {
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
}


?>


 <!--navigation-------------->
    <nav>
        <!--logo--------------->
        <a href="#" class="logo">
            <img src="oatmilk.png"/>
        </a>
        <!--menu--btn----------------->
        <input type="checkbox" class="menu-btn" id="menu-btn"/>
        <label class="menu-icon" for="menu-btn">
            <span class="nav-icon"></span>
        </label>
        <!--menu-------------->
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="promotions.php">Promotions</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li><a href="bookings.php">Check Bookings</a></li>
            <?php if (!isset($_SESSION['email'])): ?>
            <li><a href="login.php">Sign in</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['email'])): ?>
            <li><a href="logout.php">Log out</a></li>
            <?php endif; ?>
           
        </ul>
        <!--search------------->
        <div class="search">
            <input type="text" placeholder="Search Movies"/>
            <!--search-icon----------->
            <button><i class="fa fa-search"></i></button>
        </div>
        <div class="dropdown d-flex">
  <?php 
  if (isset($email) && isset($password)){
    $sql = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";  
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if ($result) {
      // Get user data
      $user = mysqli_fetch_assoc($result);

      // Access user data using array keys
      $user_id = $user['user_id'];
      $user_type = $user['user_type'];

      // Display dropdown menu based on user type
      if ($user_type == 'manager') { ?>
        <a class="navbar-brand dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <!-- //change the image// -->
          <img src="legendlogo.jpg" alt="Bootstrap" width="30" height="30" class="mt-1">
        </a>
        <ul class="dropdown-menu">
          <!-- //items in your drop out// -->
          <li><a class="dropdown-item" href="#">Edit Movie Page</a></li>
          <li><a class="dropdown-item" href="#">Edit Food and Beverage</a></li>
          <li><a class="dropdown-item" href="#">Allocation of Movie</a></li>
          <li><a class="dropdown-item" href="#">View Sales Report</a></li>
          <li><a class="dropdown-item" href="#">Edit Rewards Menu</a></li>
        </ul>


        <!-- Display Staff dropdown menu-->
      <?php } elseif ($user_type == 'staff') { ?>
        <a class="navbar-brand dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <!-- //change the image// -->
          <img src="legendlogo.jpg" alt="Bootstrap" width="30" height="30" class="mt-1">
        </a>
        <ul class="dropdown-menu">
          <!-- //items in your drop out// -->
          <li><a class="dropdown-item" href="#">View Food and Beverage</a></li>
        </ul>
      


        <!-- Display Staff dropdown menu-->
      <?php } elseif ($user_type == 'systemAdmin') { ?>
        <a class="navbar-brand dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <!-- //change the image// -->
          <img src="legendlogo.jpg" alt="Bootstrap" width="30" height="30" class="mt-1">
        </a>
        <ul class="dropdown-menu">
          <!-- //items in your drop out// -->
          <li><a class="dropdown-item" href="#">Edit User Account</a></li> <!-- Add and Remove-->
          <li><a class="dropdown-item" href="#">Change Theme of Website</a></li>
          <li><a class="dropdown-item" href="#">Assign Roles to Users</a></li>
        </ul>




      <?php } elseif ($user_type == 'loyaltyMember') { ?>
        <a class="navbar-brand dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <!-- //change the image// -->
          <img src="legendlogo.jpg" alt="Bootstrap" width="30" height="30" class="mt-1">
        </a>
        <ul class="dropdown-menu">
          <!-- //items in your drop out// -->
          <li><a class="dropdown-item" href="#">View Promotions</a></li> 
        </ul>
      <?php }
    }
  }
?>
</div>
  </nav>
    
    <body>
        <section id="main">
            <div class ="background">
              <div class="first-container">
                <br>
                <div class="first-box">
                  <div class="box">
                   <img src="spiderman.png" alt="Image 1">
                   <p style ="color:white;"class="caption">Bitten by a radioactive spider in the subway, Brooklyn teenager Miles Morales<br> suddenly develops mysterious powers that transform him 
                    into the one and<br> only Spider-Man. When he meets Peter Parker, he soon realizes that there<br> are many others who share his special,
                    high-flying talents.<br></p>
                   <p class="genres">GENRES</p>
                   <p class="word">ACTION,CARTOON</p>
                   
                    <button id="button1">WATCH <br>TRAILER 
                    <img src="play.png" alt="Image 2"></button>
                    <button id="button2">BOOK<br>NOW</button>
                    <p id="imdb">
                    <img src="IMDB.png" alt="Image 3"><br>
                    </p>
                </div>
                <div class="box2">
                    <h1>Movies screening now</h1>
                    <div class="slider-container">
                      <div class="slider">
                        <!-- Movie 1 -->
                        <div class="slide">
                          <img src="Movie1.jpg" alt="Image 1"><br>
                          <p class="caption1">Star trek</p>
                          <button>Book now</button>
                        </div>
                        <!-- Movie 2 -->
                        <div class="slide">
                          <img src="Movie2.jpg" alt="Image 2">
                          <p class="caption1">Thor: Love and Thunder</p>
                          <button>Book now</button>
                        </div>
          
                        <!-- Movie 3 -->
                        <div class="slide">
                          <img src="Movie3.jpg" alt="Image 3">
                          <p class="caption1">Les Croods</p>
                          <button>Book now</button>
                        </div>
          
                         <!-- Movie 4 -->
                        <div class="slide">
                          <img src="Movie4.jpg" alt="Image 4">
                          <p class="caption1">Toy Story 3</p>
                          <button>Book now</button>
                        </div>              
                      </div>
                    </div>           
                  </div>   
                  <div class="box3">
                    <h1>Upcoming Movies</h1>
                    <div class="slider-container">
                      <div class="slider">
                        <!-- Movie 1 -->
                        <div class="slide">
                          <img style = "opacity: 0.3;"src="m-1.jpg" alt="Image 1"><br>
                          <p class="caption1">Kin</p>
                          <button style="background-color: grey;" >Unavailable</button>
                        </div>
                        <!-- Movie 2 -->
                        <div class="slide">
                          <img style = "opacity: 0.3;" src="m-2.jpg" alt="Image 2">
                          <p class="caption1">Train To Busan</p>
                          <button style="background-color: grey;">Unavailable</button>
                        </div>
          
                        <!-- Movie 3 -->
                        <div class="slide">
                          <img style = "opacity: 0.3;" src="m-3.jpg" alt="Image 3">
                          <p class="caption1">Inception</p>
                          <button style="background-color: grey;">Unavailable</button>
                        </div>
          
                         <!-- Movie 4 -->
                        <div class="slide">
                          <img style = "opacity: 0.3;" src="m-4.jpg" alt="Image 4">
                          <p class="caption1">Iron Man 3</p>
                          <button style="background-color: grey;">Unavailable</button>
                        </div>              
                  </div>
                </div>
              </div>
			  
			  
			  
			  
			  
			  
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
                  <i class="fa fa-instagram"></i>
                  <i class="fa fa-facebook"></i>
                  <i class="fa fa-twitter"></i>
          <pre style="font-size: 10px;">      
          <i class="fa fa-copyright"></i>2023 oatmilk. All Rights Reserved
                  </pre>
                </div>                  
              </div>
              </div>
              </div>
              </div>
              </section>
                    
                    
                 
   



  
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>