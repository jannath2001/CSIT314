<?php
session_start();
include("DBTicketBooking.php");
include("navbar.php");

?>
<html>
<head>
  <style>
     body {
      font-family: Arial, sans-serif;
      background-color: #000;
      color: #fff;
      margin: 0;
    }
    
    .container {
      margin: 50px auto;
      width: 80%;
      background-color: #222;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
      text-align: center;
    }
    
    h1 {
      text-align: center;
      margin-top: 0;
    }
    
    form {
      margin: 20px 0;
      text-align: center;
    }
    
    label {
      display: inline-block;
      width: 120px;
      text-align: right;
      margin-right: 10px;
    }
    
    input[type="text"] {
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #666;
      background-color: #333;
      color: #fff;
      width: 200px;
    }
    
    input[type="submit"] {      
      padding: 10px;
      border-radius: 5px;
      border: none;
      background-color: #777;
      color: #fff;
      cursor: pointer;
      margin-top: 20px;
      
    }
		
  </style>
</head>
<html>
 <head>
    <link rel="stylesheet" href="homestylesheet.css"/> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head> 
 
 
	<!--content------------->
  <body style = "background-color:black">    
    <br/><br/><br/>
      <h1>Cinema Managers Sales</h1>   
    <div class="container">
    <div> 
        <form action="dailyGenerateReport.php">        
        <input type="submit" value="Generate Report: Daily">
        </form>
        <form action="weeklyGenerateReport.php">  
        <input type="submit" value="Generate Report: Weekly">
        </form>
        <form action="monthlyGenerateReport.php">  
        <input type="submit" value="Generate Report: Monthly">
        </form>
    </div>
  </body>
	<!--footer------------->
                 
              </body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>