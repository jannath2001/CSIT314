<!-- Start the Session -->
<?php
session_start();
include("DBTicketBooking.php");

class LoginController {
    public $conn;
    public $email;
    public $password;

    function __construct() {
        include("DBTicketBooking.php");
        $this->conn = $conn;
    }

    function getEmail() {
        if(isset($_COOKIE['email'])) {
            return $_COOKIE['email'];
        } else {
            return $this->email;
        }
    }

    function getPassword() {
        if(isset($_COOKIE['password'])) {
            return $_COOKIE['password'];
        } else {
            return $this->password;
        }
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    function setPassword($password) {
        $this->password = $password;
    }

    function verifyCredentials(){
        if(isset($_COOKIE['email']) && isset($_COOKIE['password']) )
        {
            $this->setEmail($this->email);
            $this->setPassword($this->password);
        }
        else
        {
            $this->email = $this->password = "";
        }
    
        //Check whether the form has been filled
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                
                //Getter Method
                $this->email = $_POST['email'];  
                $this->password = $_POST['password'];

                //Setter Method
                $this->setEmail($this->email);
                $this->setPassword($this->password);
                
                //to prevent from mysqli injection  
                $this->email = stripcslashes($this->email);  
                $this->password = stripcslashes($this->password); 
                $this->email = mysqli_real_escape_string($this->conn, $this->email);  
                $this->password = mysqli_real_escape_string($this->conn, $this->password);  
                
                $sql = "select * from login where email = '$this->email' and password = '$this->password'";  
                $result = mysqli_query($this->conn, $sql);  
                $count = mysqli_num_rows($result);  
                
                if($count == 1){   
                    $_SESSION['email'] = $this->email; // Initialize Session 
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
                    $_SESSION['email'] = $this->email;
                    $_SESSION['password'] = $this->password;
                    
                    // Send user to homepage when credentials are correct
                    header("Location: index.php"); 
                }   
                else{  
                    echo "<h1> Login failed. Invalid email or password.</h1>";  
                    unset($_SESSION['email']); // Unset session variable
                }
                    
            } 
            else {
                    echo "<h1> Login failed. Please enter email and password.</h1>";
                    unset($_SESSION['email']); // Unset session variable
            }
        }
    }    
}

?>