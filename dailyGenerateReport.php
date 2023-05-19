<?php
include("DBTicketBooking.php");
include("navBar.php");
include("salesController.php");
include("footer.php");

// create a new instance of the movie controller
$dailyController = new salesController($conn);

// call the getAllMovies method to retrieve the movie data
$dailySales = $dailyController-> getTotalDaily();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="homestylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background-color: black;
            color: white;
        }

        .header {
            text-align: center;
            margin-top: 100px;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }

        table {
            border-collapse: collapse;
            border: 1px solid black;
            padding: 4px;
            cellspacing: 50px;
        }

        th,
        td {
            border: 2px solid white;
            padding: 8px;
            text-align: center;
        }

        .edit {
            display: inline-block;
            padding: 10px 20px;
            background-color: #5D3FD3;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        .delete{
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFFFFF;
            color: black;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }

        #addcontainer{
            display: inline-block;
            padding: 5px;
            background-color: #5D3FD3;            
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top:10px;
            margin-left:800px;
        }

        #addcontainer:hover{
            background-color: green; 
        }
    </style>
    

</head>


<body>
<div class="header">
        <h2>Daily Sales</h2>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dailySales as $daily): ?>
                    <tr>
                        <td>
                            <?php echo $daily['date']; ?>
                        </td>
                        <td>
                            <?php echo $daily['total']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <!-- Back to prev page-->        
        <form style = "margin-left: 52%; margin-top: 20px;" action="salesReport.php">  
        <input style ="background-color:#5D3FD3; border-radius:5px;" type="submit" value="Back">
        </form>
    
</body>

</html>