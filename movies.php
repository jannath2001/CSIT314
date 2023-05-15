<!-- Start the Session -->
<?php
include("DBTicketBooking.php");
include("navBar.php");
include("footer.php");
include("moviesController.php");

$movieController = new MovieController($conn);
$movies = $movieController->getMovies();
?>

<!DOCTYPE html>
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
      height: 100%;
      object-fit: cover;
      object-position: center;
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

<!-- Start of content -->
<!-- Setting background and header of page -->

<body style="background-color: black;">
  <br /><br /><br />
  <h1>Movies</h1>
  <div class="container">

    <?php
    foreach ($movies as $movie) {
      $movie_id = $movie['movie_id'];
      $movie_name = $movie['movie_name'];
      $availability = $movie['availability'];
      $price = $movie['price'];
      $rating = $movie['rating'];
      $format = $movie['format'];
      $image = $movie['image'];
      ?>

      <div class="item">
        <img src="<?php echo $image ?>" alt="<?php echo $movie_name ?>">
        <!-- <h2>
          <?php echo $movie_name ?>
        </h2>
        <p>Status:
          <?php echo $availability ?>
        </p>
        <p>Price: $
          <?php echo $price ?>
        </p>
        <p>Rating:
          <?php echo $rating ?>/10
        </p>
        <p>Format:
          <?php echo $format ?>
        </p> -->
        <input style="width:20%;" type="text" value="$<?php echo $price ?>" disabled>
        <button onclick="window.location.href='bookMovie.php?id=<?php echo $movie_id ?>'">Book Now</button>
      </div>

      <?php
    }

    if (empty($movies)) {
      echo "No movies available.";
    }

    // Close database connection
    mysqli_close($conn);
    ?>

  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
  integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>