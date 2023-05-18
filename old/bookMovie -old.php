<?php
include("DBTicketBooking.php");
include("bookMovieController.php");
include("moviesController.php");

$movieController = new MovieController($conn);
$movieName = '';


// Retrieve the movie_id from the URL
if (isset($_POST['bookNow'])) {
  if (isset($_POST['movie_id'])) {
    $movie_id = $_POST['movie_id'];
    $movie = $movieController->getMovieDetails($movie_id);

    if ($movie) {
      // Display the movie details or perform further processing
    
    $movie_name = $movie['movie_name'];
    $genre =$movie['genre'];
    $duration = $movie['duration'];
    $age_rating = $movie['age_rating'];
    $subtitle = $movie['subtitle'];
    $MovieSynopsis= $movie['MovieSynopsis'];
    $image = $movie['image'];
    session_start();
    $_SESSION["room_id"] = $movie["room_id"];
   
  
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
        <!-- <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown button
          </button>
          <ul class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item text-white" href="#">Action</a></li>
            <li><a class="dropdown-item text-white" href="#">Another action</a></li>
            <li><a class="dropdown-item text-white" href="#">Something else here</a></li>
          </ul>
        </div> -->
        <div class="btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
          <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="Dates" class="btn btn-secondary" value="" onclick="selectButton(this)"><span>15 Dec 2023</span><br/>Tue</button>
          </div>
          <div class="btn-group mr-2" role="group" aria-label="Second group">
            <button type="button" id="Dates" class="btn btn-secondary" value="" onclick="selectButton(this)"><span>16 Dec 2023</span><br/>Tue</button>
          </div>
          <div class="btn-group mr-2" role="group" aria-label="Third group">
            <button type="button" id="Dates" class="btn btn-secondary" value="" onclick="selectButton(this)"><span>17 Dec 2023</span><br/>Tue</button>
          </div>
          <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="Dates" class="btn btn-secondary" value="" onclick="selectButton(this)"><span>18 Dec 2023</span><br/>Tue</button>
          </div>
          <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="Dates" class="btn btn-secondary" value="" onclick="selectButton(this)"><span>19 Dec 2023</span><br/>Tue</button>
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
      <form action="menu.php" method="POST" hidden="hidden">
        <input type="text" name="ticketType" value="" id="ticketTypeInput"/>
        <input type="text" name="date" value="" id="dateInput"/>
        <input type="text" name="time" value="" id="timeInput"/>
        <input type="text" name="seats" value="" id="seatsInput"/>
        <input type="text" name="location" value="" id="locationInput"/>
        <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
        <input type="hidden" name="room_id" value="<?php echo $_SESSION["room_id"]; ?>">

        <input type="submit" value="Submit" id="submitInput"/>
      </form>
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
          <h6 class="text-white" id="1">REGULAR 2D</h6>
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
          <h6 class="text-white" id="2">GOLD CLASS 2D</h6>
          <div class="btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
              <button type="button" class="btn btn-secondary" id="GOLD" onclick="testMe(this)">11:00</button>
            </div>
          </div>
          <br/>
          <h6 class="text-white" id="3">VIP CLASS 3D</h6>
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
          <h6 class="text-white" id="4">REGULAR 2D</h6>
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
          <h6 class="text-white" id="5">REGULAR 2D</h6>
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
                <table style="margin-bottom:60px;">
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
                      <input class="form-check-input" type="checkbox" value="A1" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        A1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="B1" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        B1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="C1" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        C1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="D1" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        D1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="E1" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        E1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="F1" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        F1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="G1" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        G1
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="H1" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
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
                      <input class="form-check-input" type="checkbox" value="A2" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        A2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="B2" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        B2 
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="C2" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        C2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="D2" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                       D2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="E2" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                       E2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="F2" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        F2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="G2" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                       G2
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="H2" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
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
                      <input class="form-check-input" type="checkbox" value="A3" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        A3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="B3" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        B3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="C3" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        C3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="D3" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        D3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="E3" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        E3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="F3" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        F3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="G3" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        G3
                      </label>
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="H3" id="flexCheckDefault" onclick='checkMe(${ticketNumber})'>
                      <label class="form-check-label" for="flexCheckDefault">
                        H3
                      </label>
                      </div>
                    </td>
                  </tr>
                  <div style="margin-top:50px;">
                  <button id="confirm" class='confirm-btn' onclick="insertData()">Confirm Seating</button>
                  </div>
                </div>
                
              </div>
              
          </div>
          
      `
  }

  function selectButton(e) {
      for (let date of document.querySelectorAll("#Dates").values()) {
        date.value = date === e ? date.innerText : ""
      }
    }
    /**
     *
     * @Variables
     * ticketNo - Number of Tickets
     * Location - Room ID
     * Timing - Retrieved from Fixed Timing
     * Date - Retrieved from the Buttons
     * Seats - Retrieved from Checkbox
     * @Purpose
     * Send the Data into PHP through POST
     *
     * @Assumption
     * This function does not check for validation
     * or anything that exist outside of range
     */

  function insertData() {
    let ticketNo = document.getElementById("ticketNum").value;
    //let location = document.getElementsByTagName("h6")[0].id;
    let ticketType = document.getElementById("dropdown2").value;
    /* Lazy way to find timing
       Find whether VIP exist
        IF VIP DOESN'T EXIST
          FIND whether Regular Exist
            Return Gold if Regular doesn't exist
          Return Regular
        Return VIP
     */
    let timing = (document.getElementById("VIP") != null ?
        document.getElementById("VIP").innerText :
        document.getElementById("REGULAR") != null ?
            document.getElementById("REGULAR").innerText :
            document.getElementById("GOLD").innerText);
    let date = [...document.querySelectorAll("#Dates").values()].find(i => i.value !== "").value;
    let seats = [];
    /* Find all Input that has been Checked
       Push the label when value has been checked
       Doesn't check for validation
        IF user were to check input more than max tickets
        Seats will still be inputted into it
     */
    for (const seat of document.querySelectorAll('input[type="checkbox"]:checked').values()) {
      seats.push(seat.value);
    document.getElementById("locationInput").value = document.getElementById("dropdown").value;
    document.getElementById("dateInput").value = date;
    document.getElementById("timeInput").value = timing;
    document.getElementById("ticketTypeInput").value = ticketType;
    document.getElementById("seatsInput").value = seats.toString();
    document.getElementById("submitInput").click();
  }
}
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>