<html>
<head>
  <title>Review</title>
    <style>
        body {
            background-color: #1a1a1a; /* set the background color to black */
            color: #f2f2f2; /* set the text color to grey */
            font-family: Arial, sans-serif;
        }
        #boxMe {
            align-items: center;
            min-height: 50vh;
            margin-top: 200px;
            transform: translate(30%, 15%);
        }
        #spiderTitle {
            color: white;
            transform: translate(30%, 350%);
        }
    </style>
<link rel="stylesheet" href="css(popup).css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: #1a1a1a;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h1 class="text-white" id="spiderTitle">Spiderman: Into The Spider-Verse</h1>
                <img src="image_2023-05-08_00-47-24.png" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-6">
                <div id="boxMe" style="background-color: white; color: #121212; width: 500px;">
                    <h1>Leave a review</h1>
                    <p>After reuniting with Gwen Stacy, Brooklyn's full-time, friendly neighborhood Spider-Man is catapulted across the Multiverse, where he encounters a team of Spider-People charged with protecting its very existence.</p>
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                          <button type="button" class="btn btn-primary" onclick="reviewMe()">1</button>
                          <button type="button" class="btn btn-primary" onclick="reviewMe()">2</button>
                          <button type="button" class="btn btn-primary" onclick="reviewMe()">3</button>
                          <button type="button" class="btn btn-primary" onclick="reviewMe()">4</button>
                          <button type="button" class="btn btn-primary" onclick="reviewMe()">5</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php");?>
    <script>
        function reviewMe() {
            alert('Review Submitted!');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>