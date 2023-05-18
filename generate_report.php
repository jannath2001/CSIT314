<?php

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
        <h2>Displaying All Food</h2>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($foodBeverage as $foodBev): ?>
                    <tr>
                        <td>
                            <?php echo $foodBev['menu_id']; ?>
                        </td>
                        <td>
                            <?php echo $foodBev['item_name']; ?>
                        </td>
                        <td>
                            <?php echo $foodBev['description']; ?>
                        </td>
                        <td>
                            <?php echo $foodBev['price']; ?>
                        </td>
                        <td>
                            <?php echo $foodBev['image']; ?>
                        </td>
                        <td>
                        <!-- Edit movie button -->
                        <?php if (isset($foodBev['menu_id'])): ?>
                            <a href="editThatMenu.php?menu_id=<?php echo $foodBev['menu_id']; ?>" class="edit">Edit</a>
                        <?php endif; ?>

                        <!-- Delete movie button -->
                        <form method="post" action="deleteMenu.php">
                            <input type="hidden" name="menu_id" value="<?php echo $foodBev['menu_id']; ?>">
                            <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <!-- Add menu Button-->
        <div class="add-food&beverage-container" id="addcontainer">
            <a href="addMenu.php" class="add-food&beverage-button" style = "color:white; text-decoration: none;">Add Food or Beverages</a>
        </div>
    
</body>
<html>



