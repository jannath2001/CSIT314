<?php
include("DBTicketBooking.php");
include("bookMovieController.php");
include("moviesController.php");

$movieController = new MovieController($conn);
$movieName = '';

// Retrieve the movie_id from the URL
if (isset($_POST['bookNow'])) {
  if (isset($_POST['movie_id'])) {
    $selectedMovieId = $_POST['movie_id'];
    $movie = $movieController->getMovieDetails($selectedMovieId);

    if ($movie) {
      // Display the movie details or perform further processing
    
    $movie_name = $movie['movie_name'];
    $genre =$movie['genre'];
    $duration = $movie['duration'];
    $age_rating = $movie['age_rating'];
    $subtitle = $movie['subtitle'];
    $MovieSynopsis= $movie['MovieSynopsis'];
    $image = $movie['image'];

      
    } else {
      echo "Movie not found.";
    }
  } else {
    echo "Invalid movie ID.";
  }
}
?>





<html>
<head>
  <title>Dropdown Menu</title>
  <style>
    body {
      background-color: #1a1a1a; /* set the background color to black */
      color: #f2f2f2; /* set the text color to grey */
      font-family: Arial, sans-serif;
    }
    select {
      background-color: #333; /* set the dropdown background color to grey */
      color: #f2f2f2; /* set the dropdown text color to grey */
      border: none; /* remove the border */
      padding: 10px; /* add some padding to the dropdown */
      font-size: 16px; /* set the font size */
      appearance: none; /* remove the default appearance */
      -webkit-appearance: none;
      -moz-appearance: none;
      -ms-appearance: none;
      -o-appearance: none;
    }
    select:focus {
      outline: none; /* remove the outline when the dropdown is focused */
    }
    option {
      background-color: #1a1a1a; /* set the option background color to black */
      color: #f2f2f2; /* set the option text color to grey */
      font-size: 16px; /* set the font size */
    }
    option:hover {
      background-color: #333; /* set the option background color to grey on hover */
      color: #f2f2f2; /* set the option text color to grey on hover */
    }
  </style>
  <link rel="stylesheet" href="css(popup).css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: #1a1a1a;">
  <div class="container-fluid">
  
    <div class="row">
      <div class="col-6">
        <h4 class="text-white"><?php echo $movie_name; ?></h4>
        <span class="text-muted">Choose the cinema schedule that you wish to watch</span>
        <br/>
      
        <div class="btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
          <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-secondary"><span>15 Dec 2023</span><br/>Tue</button>
          </div>
          <div class="btn-group mr-2" role="group" aria-label="Second group">
            <button type="button" class="btn btn-secondary"><span>16 Dec 2023</span><br/>Tue</button>
          </div>
          <div class="btn-group mr-2" role="group" aria-label="Third group">
            <button type="button" class="btn btn-secondary"><span>17 Dec 2023</span><br/>Tue</button>
          </div>
          <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-secondary"><span>18 Dec 2023</span><br/>Tue</button>
          </div>
          <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-secondary"><span>19 Dec 2023</span><br/>Tue</button>
          </div>
        </div>
        <br/>
        <label for="dropdown" style="color: white">Select a location:</label>
        <select id="dropdown" onclick="clickMe()">
          <option value="none" selected disabled hidden>Click Here</option>
          <option value="jewel">Jewel</option>
          <option value="cathay">The Cathay</option>
          <option value="bugis">Bugis+</option>
        </select>

        <div id="changeMe">
          
          </div>

      </div>
      <div class="col-6">
        <div id="top-right" style="background-color: #1a1a1a; color: white; width: 500px;">
          <img src="<?php echo $image; ?>" alt="Spider-Man" style="height:100px" />
          <h1><?php echo $movie_name; ?></h1>
          <ul>
            <li><strong>Genre: </strong><?php echo $genre; ?></li>
            <li><strong>Duration: </strong> <?php echo $duration; ?> minutes</li>
            <li><strong>Age rating: </strong> <?php echo $age_rating; ?></li>
            <li><strong>Subtitle: </strong> <?php echo $subtitle; ?></li>
            <li><strong>Movie Synopsis: </strong><?php echo $MovieSynopsis; ?></li>
          </ul>
          <button type="button" class="btn btn-light" onclick="shareMe()">Share</button>
        </div>

        <div id="rightMe">

        </div>

        <div id="myModal">
          
        </div>
    </div>
  </div>
  <script>

    function shareMe() {
      alert("Copied to clipboard!");
    }
    function clickMe() {
      console.log(document.getElementById("dropdown").value)
      if (document.getElementById("dropdown").value == 'jewel') {
        document.getElementById("changeMe").innerHTML = `
          <h4 class="text-white">Jewel</h4>
          <h6 class="text-white">REGULAR 2D</h6>
          <div class="btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
              <button type="button" class="btn btn-secondary" id="REGULAR" onclick="testMe(this)">11:00</button>
            </div>
            <div class="btn-group mr-2" role="group" aria-label="Second group">
              <button type="button" class="btn btn-secondary" id="REGULAR" onclick="testMe(this)">12:00</button>
            </div>
            <div class="btn-group" role="group" aria-label="Third group">
              <button type="button" class="btn btn-secondary" id="REGULAR" onclick="testMe(this)">13:00</button>
            </div>
          </div>
          <br/>
          <h6 class="text-white">GOLD CLASS 2D</h6>
          <div class="btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
              <button type="button" class="btn btn-secondary" id="GOLD" onclick="testMe(this)">11:00</button>
            </div>
          </div>
          <br/>
          <h6 class="text-white">VIP CLASS 3D</h6>
          <div class="btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
              <button type="button" class="btn btn-secondary" id="VIP" onclick="testMe(this)">11:00</button>
            </div>
          </div>
        `;
      }
      else if (document.getElementById("dropdown").value == 'cathay') {
        document.getElementById("changeMe").innerHTML = `
          <h4 class="text-white">The Cathay</h4>
          <h6 class="text-white">REGULAR 2D</h6>
            <div class="btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
              <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary" id="REGULAR" onclick="testMe(this)">11:00</button>
              </div>
            </div>
        `;
      }
      else if (document.getElementById("dropdown").value == 'bugis') {
        document.getElementById("changeMe").innerHTML = `
          <h4 class="text-white">Bugis+</h4>
          <h6 class="text-white">REGULAR 2D</h6>
            <div class="btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
              <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary" id="REGULAR" onclick="testMe(this)">11:00</button>
              </div>
            </div>
        `;
      }
    }

    function testMe(ele) {
      console.log(ele.id);
      console.log(ele.innerHTML);
      document.getElementById("rightMe").innerHTML = `
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">${ele.id}</h5>
          <label for="dropdown" style="color: black">Select a ticket type:</label>
          <select id="dropdown2" onclick="ticketMe()">
            <option value="none" selected disabled hidden>Click Here</option>
            <option value="adult">Adult</option>
            <option value="student">Student</option>
          </select>
          <label for="inputTicket">Ticket Number:</label><input type='number' id='ticketNum' min='1' />
          <h6 class="card-subtitle mt-2 mb-2 text-muted">Time: ${ele.innerHTML}</h6>
          <button class="btn btn-primary" onclick="buyNow()">Buy Now</button>
        </div>
      </div>
      `
    }

  var counter = 0;
  function ticketMe() {  
    var checkType = document.getElementById("dropdown2").value;
    if (checkType == 'adult' && counter == 0) {
      counter++;
      alert('Please make sure that you are above 21 and are purchasing for yourself only, any conditions not met means the void of this ticket');
      // console.log(counter)
    }
    // For student dropdown
    else if (checkType == 'student' && counter == 0) {
      counter++;
      alert('Please make sure that you are below 18 and are purchasing for yourself only, any conditions not met means the void of this ticket');
      // console.log(counter)
    }
    
  }

  function checkMe(ticket) {
    console.log(ticket)
    //console.log(document.querySelectorAll('input[type="checkbox"]:checked').length);
    if (ticket < document.querySelectorAll('input[type="checkbox"]:checked').length) {
      alert('Max Ticket Number Reached!');
      location.reload();
    }
  }


  function buyNow() {
    var ticketNumber = document.getElementById("ticketNum").value;
      // Edit Here
      document.getElementById("myModal").innerHTML = `
      <div class="modal-content">
              <span class="close">&times;</span>
              <div class="seating-plan">
                <table>
                  <tr>
                    <th></th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>E</th>
                    <th>F</th>
                    <th>G</th>
                    <th>H</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        A1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        B1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        C1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        D1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        E1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        F1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        G1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        H1
                      </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>2</th>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        A2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        B2 
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        C2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                       D2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                       E2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        F2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                       G2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        H2
                      </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th>3</th>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        A3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        B3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        C3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        D3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        E3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        F3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        G3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        H3
                      </label>
                      </div>
                    </td>
                  </tr>
                  <button class='confirm-btn'>Confirm Seating</button>
                </div>
                
              </div>
              
          </div>
          
      `

  }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>