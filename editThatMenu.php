<?php
include("DBTicketBooking.php");
include("editThatMenuController.php");
include("navBar.php");



$menuEditController = new menuUpdateController($conn);
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
    if (isset($_GET['menu_id'])) {
        $id = $_GET['menu_id'];
        $result = $menuEditController->editMenuDetails($id);

        if ($result) {
            if (isset($_POST['update'])) {
                // Get the updated data from the form
                $updatedData = $_POST;
    
                // Call the updateMenuDetails method
                $menuEditController->updateMenuDetails($id, $updatedData);
            }
    
        ?>



        <div class=table-body>
            <form action="editThatMenu.php?menu_id=<?php echo $_GET['menu_id']; ?>" method="POST">
                <input type="hidden" name="menu_id" value="<?php echo $_GET['menu_id']; ?>">

                <div class="mb-3">
                    <label for="item_name">Menu name:</label>
                    <input type="text" name="item_name" value="<?= $result['item_name'] ?>" placeholder="Enter the Item"
                        Required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description">Format:</label>
                    <input type="text" name="description" value="<?= $result['description'] ?>"
                        placeholder="Enter the description" Required>
                </div>

                <div class="mb-3">
                    <label for="price">Price:</label>
                    <input type="number" name="price" value="<?= $result['price'] ?>" placeholder="Enter the Price"
                        Required>
                </div>


                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="text" name="image" value="<?= $result['image'] ?>" placeholder="Enter the image"
                        Required>
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
    <?php include("footer.php");?>
</body>

</html>