<!-- Start the Session -->
<?php
ob_start();

include("DBTicketBooking.php");
include("loginController.php");

$loginController = new LoginController();
$loginController->verifyCredentials();


// var_dump($_POST['email']);
// var_dump($_POST['password']);
// var_dump($loginController->getEmail());
// var_dump($loginController->getPassword());


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
            <input type="email" id="email" name="email" required value="<?php echo $loginController->getEmail(); ?>"/> 
            <label for="password">Password</label> 
            <input type="password" id="password" name="password" required value="<?php echo $loginController->getPassword();?>"> 
            <div class="remember-forgot">
              <div class="remember">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
              </div>
              <div class="forgot">
                <a href="resetPassword.php">Forgot Password?</a>
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