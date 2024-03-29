<?php
include("DBTicketBooking.php");
include("navBar.php");
include("movieAllocationController.php");



$movieAllocationController = new movieAllocationController($conn);

// Handle form submission
if (isset($_POST['submit'])) {
    $cinemaSelections = $_POST['cinema'];
    $sessionSelections = $_POST['session'];
    $roomsList = array_values($cinemaSelections);
  
    $success = true;
    $counter = 0;
    foreach ($cinemaSelections as $movie => $roomid) {
        if (!$movieAllocationController->updateCinemaRoom($roomid, $movie)) {
            $success = false;
            break;
        }
    }

    foreach($sessionSelections as $movie_id => $session){
        $roomid = $roomsList[$counter];
        if(!$movieAllocationController->validateSession($roomid, $movie_id, $session)){
            $success = false;
            break;
        }
        $counter++;
    }
    if ($success) {
        // Redirect to a success page
        header("Location: movies.php");
        exit();
    } else {
        // Error occurred while assigning room
        echo "Error occurred.";
    }
}
?>

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
            padding-top: 100px;
            padding-bottom: 50px;
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

        /* .item {
            flex: 2;
            margin: 20px;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            text-align: center;
        } */

        .item {
            width: 250px;
            height: 350px;
            margin: 20px;
            padding: 10px 10px 30px 10px;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            text-align: center;
        }

        .item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            object-position: center;
            border-radius: 10px;
        }

        .dropdown1 {
            margin-top: 10px;
        }

        .submit-button {
            width: 100px;
            height: 50px;
            margin: 20px auto;
            display: block;
        }
    </style>

</head>
<html>

<head>
    <link rel="stylesheet" href="homestylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!--content------------->

<body style="background-color: black;">
    <h1>Movie Allocation</h1>
    <div class="container">
        <div>
            <?php $movieAllocations = $movieAllocationController->getMovieAllocations(); ?>
        </div>
        <div>
            <form method="post">
                <?php
                // Assuming $movieAllocations is populated with the necessary data
                $form = $movieAllocationController->generateMovieAllocationForm($movieAllocations);

                // Display the form
                echo $form;
                ?>
        </div>
        <div style="justify-content: center;">
            <button type="submit" name="submit" value="submit" class="submit-button">Submit</button>
        </div>
        </form>
    </div>
 
</body>

<!--footer------------->
<?php include("footer.php");?>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

</html>