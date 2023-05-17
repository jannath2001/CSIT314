<!-- Start the Session -->
<?php
include("DBTicketBooking.php");
include("navBar.php");
include("footer.php");
include("menuController.php");

$menuController = new MenuController($conn);
$menu = $menuController->getMenu();
$id = '';

if (isset($_GET["menu_id"]))
    $id = $_GET["menu_id"];
/*
 * Check for POST that has variables
 * Variables --> TicketNo, Location, Timing, Date, Seats
 * Pass all data into Session / Cookie
 */
if (isset( $_POST["date"], $_POST["time"], $_POST["ticketType"], $_POST["seats"])) {
  session_start();
  $movie_id = $_POST["movie_id"];
  //$roomID = $_POST["roomID"];
  $timing = $_POST["time"];
  $date = $_POST["date"];
  $seats = $_POST["seats"];
  $dateTime = date('Y-m-d H:i:s', strtotime("$date $timing"));
  $seats = explode(",", $seats);
  $_SESSION["movie_id"] = $movie_id;
  $_SESSION["dateTime"] = $dateTime; // Corrected variable assignment
  $_SESSION["seats"] = $seats; // Corrected variable assignment
  var_dump( $movie_id);
  var_dump( $dateTime);
  var_dump( $seats);
}

?>

<!DOCTYPE html>
<html>
<head>
  <style>     
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

<!-- Start of content -->
    <!-- Setting background and header of page -->
    <body style="background-color:black">
    <br/><br/><br/>
    <h1>Our Menu</h1>
    <div class="container">

   
    <form method="post" action="checkout.php">
    <?php
    
    foreach($menu as $menus){
        $menu_id = $menus['menu_id'];
        $item_name = $menus['item_name'];
        $description = $menus['description'];
        $price = $menus['price'];
        $image = $menus['image'];
    ?>
        <div class="item">
            <img src="<?php echo $image ?>" alt="<?php echo $item_name ?>">
            <h2><?php echo $item_name ?></h2>
            <p><?php echo $description ?></p>
            <input style="width:20%;" type="text" value="$<?php echo $price ?>" disabled>        
            <input type="checkbox" name="menu_item[]" value="<?php echo $menu_id ?>" id="number<?php echo $menu_id ?>" />
            <label for="number<?php echo $menu_id ?>">SELECT</label>
        </div>
     <?php
    }
    //Close database connection
    mysqli_close($conn);
     ?>
    
    <button type="submit">Next</button>
    </form>
    <?php
     if(isset($_POST['menu_item[]'])) {
      // Checkbox is checked
      $checkbox_value = $_POST['checkbox_name'];

  }

     ?>

    </div>

                
              </body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>
<!-- 

