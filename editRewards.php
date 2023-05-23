<?php
include("DBTicketBooking.php");
include("editRewardsController.php");
include("navBar.php");

// create a new instance of the movie controller
$rewardsController = new rewardsController($conn);

// call the getAllMovies method to retrieve the movie data
$rewards = $rewardsController->getAllRewards($conn);
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

        .add-Rewards-container{
            display: inline-block;
            padding: 5px;
            background-color: #5D3FD3;            
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top:10px;
            margin-left:850px;
        }

        .add-Rewards-container:hover{
            background-color: green; 
        }
    </style>
    

</head>


<body>
<div class="header">
        <h2>Displaying All rewards</h2>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Reward ID</th>
                    <th>Reward Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Points for Reward</th>
                    <th>Reward Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rewards as $rew): ?>
                    <tr>
                        <td>
                            <?php echo $rew['reward_id']; ?>
                        </td>
                        <td>
                            <?php echo $rew['reward_name']; ?>
                        </td>
                        <td>
                            <?php echo $rew['description']; ?>
                        </td>
                        <td>
                            <?php echo $rew['image']; ?>
                        </td>
                        <td>
                            <?php echo $rew['reward_Point']; ?>
                        </td>
                        <td>
                            <?php echo $rew['rewardAmount']; ?>
                        </td>
                        <td>
                        <!-- Edit movie button -->
                        <?php if (isset($rew['reward_id'])): ?>
                            <a href="editThatRewards.php?reward_id=<?php echo $rew['reward_id']; ?>" class="edit">Edit</a>
                        <?php endif; ?>

                        <!-- Delete movie button -->
                        <form method="post" action="deleteReward.php">
                            <input type="hidden" name="reward_id" value="<?php echo $rew['reward_id']; ?>">
                            <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <!-- Add menu Button-->
        <div class="add-Rewards-container">
            <a href="addReward.php" class="add-Rewards-button" style = "color:white; text-decoration: none;">Add rewards</a>
        
    </div>
    <?php include("footer.php");?>
</body>

</html>