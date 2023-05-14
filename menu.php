<?php
include("DBTicketBooking.php");
include("navBar.php");
include("footer.php");

?>
<!DOCTYPE html> 
<html> 
<script> 
     $(document).ready(function() { 
   $('.minus').click(function () { 
    var $input = $(this).parent().find('input'); 
    var count = parseInt($input.val()) - 1; 
    count = count < 1 ? 1 : count; 
    $input.val(count); 
    $input.change(); 
    return false; 
   }); 
   $('.plus').click(function () { 
    var $input = $(this).parent().find('input'); 
    $input.val(parseInt($input.val()) + 1); 
    $input.change(); 
    return false; 
   }); 
  }); 
</script> 
 
<head> 
  <style> 
    .quantity-number { 
    display: inline; 
    border: 1px solid grey; 
    padding: 4px 0px; 
    } 
    .quantity-number input { 
    border: none; 
    padding: 5x 10px; 
    } 
    .quantity-number button { 
    background-color: grey; 
    border: none; 
    padding: 6px 10px; 
    } 
 
 
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
      width: 200px; 
      height: 200px; 
      margin-bottom: 20px; 
      border-radius: 50%; 
      object-fit: cover; 
      object-position: center; 
    } 
    .item h2 { 
      font-size: 24px; 
      margin-bottom: 10px; 
    } 
    .item p { 
      font-size: 18px; 
      margin-bottom: 10px; 
    } 
    .item span { 
      font-size: 14px; 
      color: #aaa; 
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
   <!--  <nav> 
         logo---------------> 
        <!-- <a href="#" class="logo"> 
            <img src="oatmilk.png"/> 
        </a> 
        menu--btn-----------------> 
        <!-- <input type="checkbox" class="menu-btn" id="menu-btn"/> 
        <label class="menu-icon" for="menu-btn"> 
            <span class="nav-icon"></span> 
        </label> 
        menu--------------> 
        <!-- <ul class="menu"> 
        <li><a href="index.php">Home</a></li>
        <li><a href="promotions.php">Promotions</a></li>-------------->
  <!--  <li><a href="movies.php">Movies</a></li>
        <li><a href="bookings.php">Check Bookings</a></li>-------------->
   <!-- <li><a href="login.php">Sign in</a></li>
            <li><a href="logout.php">logout</a></li> 
        </ul> 
              search-------------> 
        <!-- <div class="search"> 
            <input type="text" placeholder="Search Movies"/> 
              search-icon-----------> 
            <!-- <button><i class="fa fa-search"></i></button> 
        </div> 
        <div class="dropdown d-flex"> 
            <a class="navbar-brand dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"> 
                  //change the image// --> 
                <!-- <img src="legendlogo.jpg" alt="Bootstrap" width="30" height="30" class="mt-1"> 
            </a> 
            <ul class="dropdown-menu"> 
                  //items in your drop out// --> 
               <!--<li><a class="dropdown-item" href="#">Select Movie Allocation</a></li> 
              <li><a class="dropdown-item" href="#">Edit Food</a></li> 
              <li><a class="dropdown-item" href="#">Edit Promotions</a></li> 
              <li><a class="dropdown-item" href="#">Edit Movies</a></li> 
              <li><a class="dropdown-item" href="#">View Sales Report</a></li>


<li><a class="dropdown-item" href="#">View Seating Plan</a></li>              
            </ul> 
        </div> 
    </nav> 
  content-------------> 
<body style = "background-color:black"> 
  <br/><br/><br/> 
 <h1>Our Menu</h1> 
  <div class="container"> 
    <div class="item"> 
      <img src="popcorn.jpg" alt="Item 1"> 
      <h2 style ="color:white;">Popcorn</h2> 
      <p>Super delicious popcorn</p> 
      <button>$10.00</button> 
      <input type="number" id="number1" min="0" max ="50" step="1" placeholder="SELECT"> 
    </div> 
    <div class="item"> 
      <img src="nachos.jpg" alt="Item 2"> 
      <h2 style ="color:white;">Nachos</h2> 
      <p>Mexican Nachos</p> 
      <button>$12.00</button> 
      <input type="number" id="number2" min="0" max ="50" step="1" placeholder="SELECT"> 
    </div> 
    <div class="item"> 
      <img src="coke.jpg" alt="Item 3"> 
      <h2 style ="color:white;">Coke</h2> 
      <p>Best softdrink</p> 
      <button>$8.00</button> 
      <input type="number" id="number3" min="0" max ="50" step="1" placeholder="SELECT"> 
    </div> 
    <div class="item"> 
      <img src="water.jpg" alt="Item 4"> 
      <h2 style ="color:white;">Water</h2> 
      <p>Water from himalaya</p> 
      <button>$15.00</button> 
      <input type="number" id="number4" min="0" max ="50" step="1" placeholder="SELECT"> 
    </div> 
  </div> 
 <!--footer------------->                  
              </body> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> 
</html>