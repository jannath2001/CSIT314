<?php
// Required to start everytime passing of data with session is required
session_start();
include("DBTicketBooking.php");
include("checkoutController.php");


$checkoutController = new CheckOutController($conn);
$menu_item = $_POST['menu_item'] ?? [];
$selectedMenuItems = is_array($menu_item) ? implode(',', $menu_item) : '';
$checkOutMenu = $checkoutController->get_menuItems($menu_item);


// Check if movie_id is set and not empty
if (isset($_SESSION["movie_id"]) && !empty($_SESSION["movie_id"])) {
  $movie_items = $_SESSION["movie_id"];
  $checkOutMovies = $checkoutController->get_movieItems($movie_items);
  $movie_name = $checkOutMovies['movie_name'];
  $image1 = $checkOutMovies['image'];
  $price1 = $checkOutMovies['price'];
  $seats = $_SESSION['seats'];
  $length = count($seats);
  $moviePrice = $price1 * $length;
} else {
  $movie_name = "";
  $image1 = "";
  $price1 = 0;
  $seats = [];
  $length = 0;
  $moviePrice = 0;
}

$_SESSION['menu_item'] = $menu_item;

?>



<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 30%; 
  flex: 30%;
}

.col-50 {
  -ms-flex: 30%; 
  flex: 30%;
}

.col-75 {
  -ms-flex: 30%; 
  flex: 30%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #FFBC0D;
  color: black;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: black;
  text-decoration: none;
  
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: black;
  
}



@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Confirm payment</h3>
            <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-paypal" style="color:blue;"></i>
              </div>
            <label for="Cardname"> Name On Card</label>
            <input type="text" id="Cardname" name="Cardname" placeholder="J. Nisha">

            <label for="CardNo"> Card Number</label>
            <input type="text" id="CardNo" name="CardNo" placeholder="4242 4242 4242 4242">
           

            <div class="row">
              <div class="col-50">
                <label for="state">expiryDate</label>
                <input type="text" id="expiryDate" name="expiryDate" placeholder="03/18">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="123">
              </div>
            </div>
          </div>       
          
        </div>
        
        <!-- <input type="submit" value="Continue to checkout" class="btn"> -->
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
    <h4>Checkout <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></h4> 

    <form style = "padding: 5px;"id='myform' method='POST' class='quantity' action="orderSummary.php">
    <span>Redeemed Reward <span class="price" style="color:red;">-$<?php echo isset($_SESSION['reward_Amount']) ? $_SESSION['reward_Amount'] : 0?></span></span>
      <input type="hidden"  id="points" value=<?php 
      echo isset($_SESSION['reward_Amount']) ? $_SESSION['reward_Amount'] : null
    ?>>
    <div>
    <?php if (!empty($movie_name)): ?>
      <p><img src="<?php echo $image1 ?>" style="width:131px; height:80px"/>
      <a><?php echo $movie_name?></a>
      <span class="price" id="moviePrice">$<?php echo $moviePrice ?></span></p>
      <?php endif; ?>
    </div>
 
    <?php
    foreach($checkOutMenu as $index => $check){
        $item_names = $check["item_name"];
        $price =  $check["price"];
        $image =  $check["image"];
    
    ?>
    <!-- first -->

    <div>
     <p><img src="<?php echo $image ?>" style="width:131px; height:80px"/>
        <a><?php echo $item_names ?></a>
        <span class="price" id="price_<?php echo $index ?>">$<?php echo $price ?></span></p>
        <input style="text-align: center; width: 40px; height: 25px; border: none;" name="counter" type="number" 
        id="counter_<?php echo $index ?>" min="1" max="50" step="1" class="qty" onchange="calculateTotalPayable()">

        <p style="display: none;">Total: <span class="price" id="total_<?php echo $index ?>" style="color:black"><b></b></span></p>

        
    </div>
        <?php
        }
        mysqli_close($conn);
     ?>
    
      <p>Total payable: <span class="price" id="total3" style="color:black"><b></b></span></p>
      <input type="hidden" id="totalPriceInput" name="totalPrice" value=""/>
      <input type="hidden" id="quantityInput" name="quantity" value=""/>
      <input type="submit" value="Confirm booking" class="btn">
      
    </div>
  </div>
  </form>  
</div>

</body>
<script>
function calculateTotalPayable() {
  // Get the movie price, if available
  var moviePriceElement = document.getElementById("moviePrice");
  var moviePrice = moviePriceElement ? parseFloat(moviePriceElement.innerHTML.substring(1)) : 0;

  // Calculate the total payable
  var totalPayable = 0;
  var qty = 0; // Initialize the quantity variable
  var menuItemSelected = false; // Flag to track if any menu item is selected

  var allQtyInputs = document.getElementsByClassName("qty");
  for (var i = 0; i < allQtyInputs.length; i++) {
    var qtyInput = allQtyInputs[i];
    var qtyValue = parseInt(qtyInput.value);
    if (!isNaN(qtyValue) && qtyValue > 0) {
      var priceIndex = qtyInput.id.replace("counter_", "");
      var priceElement = document.getElementById("price_" + priceIndex);
      var price = priceElement ? parseFloat(priceElement.innerText.replace("$", "")) : 0;
      totalPayable += price * qtyValue;
      qty += qtyValue;
      menuItemSelected = true; // Set the flag to true since a menu item is selected
    }
  }

  if (!menuItemSelected && moviePrice > 0) {
    // No menu item selected, use the movie price directly
    totalPayable = moviePrice;
    qty = 1; // Set the quantity to 1 for the movie
  } else {
    totalPayable += moviePrice;
  }

  var points = parseFloat(document.getElementById("points").value);
  if (!isNaN(points))
    totalPayable -= points;

  document.getElementById("total3").innerHTML = "$" + totalPayable;
  document.getElementById("totalPriceInput").value = totalPayable;
  document.getElementById("quantityInput").value = qty;
}

// Trigger the calculation when the page loads
window.addEventListener('load', calculateTotalPayable);

</script>



</html>




