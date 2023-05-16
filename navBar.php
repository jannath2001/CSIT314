<?php
include("DBTicketBooking.php");
include("loyaltyPoints.php");

//Start the Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//Get the user type via session
if (isset($_SESSION['user_type'])){
    $user_type = $_SESSION['user_type'];
}
else{
    $user_type = "";
}

$loyaltyPoints = Loyalty::getLoyaltyPoints();
// rest of the code
?>




<!--navigation-------------->
<nav>
    <!--logo--------------->
    <a href="#" class="logo">
        <img src="oatmilk.png" />
    </a>
    <!--menu--btn----------------->
    <input type="checkbox" class="menu-btn" id="menu-btn" />
    <label class="menu-icon" for="menu-btn">
        <span class="nav-icon"></span>
    </label>
    <!--menu-------------->
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <!--<li><a href="promotions.php">Promotions</a></li>-->
        <li><a href="movies.php">Movies</a></li>
        <!--<li><a href="bookings.php">Check Bookings</a></li>-->
        <?php if (!isset($_SESSION['email'])): ?>
            <li><a href="login.php">Sign in</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['email'])): ?>
            <li><a href="logout.php">Log out</a></li>
        <?php endif; ?>
        <li><a href="menu.php">Menu</a></li>
    </ul>
    <!--search------------->
    <div class="search">
        <input type="text" placeholder="Search Movies" />
        <!--search-icon----------->
        <button><i class="fa fa-search"></i></button>
    </div>
    <div class="dropdown d-flex">


        <?php
        
        // Display dropdown menu based on user type
        if ($user_type == 'manager') { ?>
        <a class="navbar-brand dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- //change the image// -->
                <img src="legendlogo.jpg" alt="Bootstrap" width="30" height="30" class="mt-1">
            </a>
            <ul class="dropdown-menu">
                <!-- //items in your drop out// -->
                <li><a class="dropdown-item" href="editMovie.php">Edit Movie Page</a></li>
                <li><a class="dropdown-item" href="editMenu.php">Edit Food and Beverage</a></li>
                <li><a class="dropdown-item" href="movieAllocation.php">Allocation of Movie</a></li>
                <li><a class="dropdown-item" href="#">View Sales Report</a></li>
                <li><a class="dropdown-item" href="editRewards.php">Edit Rewards Menu</a></li>
            </ul>


            <!-- Display Staff dropdown menu-->
        <?php } elseif ($user_type == 'staff') { ?>
            <a class="navbar-brand dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- //change the image// -->
                <img src="legendlogo.jpg" alt="Bootstrap" width="30" height="30" class="mt-1">
            </a>
            <ul class="dropdown-menu">
                <!-- //items in your drop out// -->
                <li><a class="dropdown-item" href="menu.php">View Food and Beverage</a></li>
            </ul>



            <!-- Display SystemAdmin dropdown menu-->
        <?php } elseif ($user_type == 'systemAdmin') { ?>
            <a class="navbar-brand dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- //change the image// -->
                <img src="legendlogo.jpg" alt="Bootstrap" width="30" height="30" class="mt-1">
            </a>
            <ul class="dropdown-menu">
                <!-- //items in your drop out// -->
                <li><a class="dropdown-item" href="editUserAccount.php">Edit User Account</a></li> <!-- Add and Remove-->
                <li><a class="dropdown-item" href="#">Change Theme of Website</a></li>
                
            </ul>



            <!-- Display loyaltyMember dropdown menu-->
        <?php } elseif ($user_type == 'loyaltyMember') { ?>
            <a class="navbar-brand dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- //change the image// -->
                <img src="legendlogo.jpg" alt="Bootstrap" width="30" height="30" class="mt-1">
            </a>
            <ul class="dropdown-menu">
                <!-- //items in your drop out// -->
                <b>
               <li class="dropdown-item">Loyalty Points:<?php echo $loyaltyPoints; ?>
            </b></li>
                <li><a class="dropdown-item" href="promotions.php">View Promotions</a></li>
                <li><a class="dropdown-item" href="viewBooking.php">View Booking</a></li>
            </ul>
        <?php }
        ?>
    </div>
</nav>