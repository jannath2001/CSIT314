<!-- Start the Session -->
<?php
session_start();
ob_start();

include("DBTicketBooking.php");
include("LoginController.php");



//var_dump($_POST['email']);
//var_dump($_POST['password']);

if(isset($_COOKIE['email']) && isset($_COOKIE['password']) )
{
  $email = $_COOKIE['email'];
  $password = $_COOKIE['password'];

}
else
{
  $email = $password = "";
}



//Check whether the form has been filled
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    
    $email = $_POST['email'];  
    $password = $_POST['password'];  
    
    //to prevent from mysqli injection  
    $email = stripcslashes($email);  
    $password = stripcslashes($password); 
    $email = mysqli_real_escape_string($conn, $email);  
    $password = mysqli_real_escape_string($conn, $password);  
    
    $sql = "select * from login where email = '$email' and password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $count = mysqli_num_rows($result);  
    
    if($count == 1){   
      $_SESSION['email'] = $email; // Initialize Session 
      if(isset($_REQUEST['remember']))
      {
        setcookie('email',$_REQUEST['email'],time()+60*60);
        setcookie('password',$_REQUEST['password'],time()+60*60);

      }
      else
      {
        setcookie('email',$_REQUEST['email'],time()-10);
        setcookie('password',$_REQUEST['password'],time()-10);
      }

      // Send the values over to other pages using session
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      
      // Send user to homepage when credentials are correct
      header("Location: index.php"); 
    }   
    else{  
        echo "<h1> Login failed. Invalid email or password.</h1>";  
        unset($_SESSION['email']); // Unset session variable
    }
    
  } else {
      echo "<h1> Login failed. Please enter email and password.</h1>";
      unset($_SESSION['email']); // Unset session variable
  }
}

?>

<!-- Start of HTML codes-->
<!DOCTYPE html>
<script>
    function goBack() {
      window.history.back();
    }
</script>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="loginstyles.css">
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="logo">
          <img src="oatmilk.png" alt="Logo">
        </div>
        <div class="login-form">
          <h2>Welcome Back!</h2>
          <p>Log in to your account to continue</p>

          <div class="loginCont">
          <form action ="login.php" method="POST">
            <input type="hidden" name="login" value="1">
            <label for="email">Email</label> 
            <input type="email" id="email" name="email" required value="<?php echo $email; ?>"/> 
            <label for="password">Password</label> 
            <input type="password" id="password" name="password" required value="<?php echo $password;?>"> 
            <div class="remember-forgot">
              <div class="remember">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
              </div>
              <div class="forgot">
                <a href="#">Forgot Password?</a>
              </div>
            </div>
            <button style = "padding: 4px 4px;" type="submit">Log In</button>
            <button style ="margin-left: 300px; padding: 4px 4px;" onclick="goBack()">Back</button>
          </form>
          </div>
          <div class="signup">
            Don't have an account? <a href="#">Sign up now</a>
          </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>