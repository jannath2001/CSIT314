<?php
include("DBTicketBooking.php");
include("editThatRewardController.php");
include("navBar.php");
include("footer.php");


$rewardEditController = new rewardUpdateController($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="homestylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .header {
            text-align: center;
            margin-top: 100px;
        }

        body {
            background-color: black;
            color: white;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body>
    <div class="header">
        <h2>Edit Menu</h2>
    </div>

    <div class="table-container">
    <?php
    if (isset($_GET['reward_id'])) {
        $id = $_GET['reward_id'];
        $result = $rewardEditController->editRewardDetails($id);

        if ($result) {
            if (isset($_POST['update'])) {
                // Get the updated data from the form
                $updatedData = $_POST;
    
                // Call the updateMenuDetails method
                $rewardEditController->updateRewardDetails($id, $updatedData);
            }
    
        ?>



        <div class=table-body>
            <form action="editThatRewards.php?reward_id=<?php echo $_GET['reward_id']; ?>" method="POST">
                <input type="hidden" name="reward_id" value="<?php echo $_GET['reward_id']; ?>">

                <div class="mb-3">
                    <label for="reward_name">Reward name:</label>
                    <input type="text" name="item_name" value="<?= $result['reward_name'] ?>" placeholder="Enter the Item"
                        Required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description">Description:</label>
                    <input type="text" name="description" value="<?= $result['description'] ?>"
                        placeholder="Enter the description" Required>
                </div>


                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="text" name="image" value="<?= $result['image'] ?>" 
                        placeholder="Enter the image" Required>
                </div>


                <div class="mb-3">
                    <label for="reward_Point">Points needed for Reward:</label>
                    <input type="number" name="reward_Point" value="<?= $result['reward_Point'] ?>" 
                        placeholder="Points needed for Reward" Required>
                </div>

                <div class="mb-3">
                    <label for="rewardAmount">Reward Amount:</label>
                    <input type="number" name="rewardAmount" value="<?= $result['rewardAmount'] ?>" 
                        placeholder="Reward amount" Required>
                </div>
                

                <div class="mb-3">
                    <button type="submit" name="update" value="update">Update</button>

                </div>
            </form>

            <?php
           
        }
        else
        {
            echo "<h4>No record Found</h4>";
        }
    }
    else
    {
        echo "<h4>Something went wrong</h4>";
    }
    ?>
        </div>
    </div>
</body>

</html>