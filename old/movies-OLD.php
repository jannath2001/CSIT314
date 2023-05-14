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
            <li><a href="login.php">Sign in</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
        <!--search------------->
        <div class="search">
            <input type="text" placeholder="Search Movies"/>
            <!--search-icon----------->
            <button><i class="fa fa-search"></i></button>
        </div>
        <div class="dropdown d-flex">
            <a class="navbar-brand dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- //change the image// -->
                <img src="legendlogo.jpg" alt="Bootstrap" width="30" height="30" class="mt-1">
            </a>
            <ul class="dropdown-menu">
                <!-- //items in your drop out// -->
              <li><a class="dropdown-item" href="#">Select Movie Allocation</a></li>
              <li><a class="dropdown-item" href="#">Edit Food</a></li>
              <li><a class="dropdown-item" href="#">Edit Promotions</a></li>
              <li><a class="dropdown-item" href="#">Edit Movies</a></li>
              <li><a class="dropdown-item" href="#">View Sales Report</a></li>
              <li><a class="dropdown-item" href="#">View Seating Plan</a></li>             
            </ul>
        </div>
    </nav>
	<!--content------------->
  <body style = "background-color:black">
    <br/><br/><br/>
    <h1>Movies</h1>
    <div class="container">
      <div class="item">
        <img src="Movie1.jpg" alt="Item 1">
        <button style = "background-color:red; border:none; border-radius:5px; ">BOOK NOW</button>
      </div>
      <div class="item">
        <img src="Movie2.jpg" alt="Item 2">
        <button style = "background-color:red; border:none; border-radius:5px; ">BOOK NOW</button>
      </div>
      <div class="item">
        <img src="Movie3.jpg" alt="Item 3">
        <button style = "background-color:red; border:none; border-radius:5px; ">BOOK NOW</button>
      </div>
      <div class="item">
        <img src="Movie4.jpg" alt="Item 4">      
        <button style = "background-color:red; border:none; border-radius:5px; ">BOOK NOW</button>
      </div>
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