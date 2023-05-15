<?php
include("DBTicketBooking.php");

class CheckOutController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    function get_menuItems($menu_items) {
        $query = "SELECT * FROM food_beverage WHERE menu_id IN (" . implode(",", $menu_items) . ")";
        $result = mysqli_query($this->conn, $query);

        $items = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $item = array(
                "menu_id" => $row['menu_id'],
                "item_name" => $row['item_name'],
                "description" => $row['description'],
                "price" => $row['price'],
                "image" => $row['image']
            );
            $items[] = $item;
        }
    
        return $items;

}
}

// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "<p>" . $row['item_name'] . " - $" . $row['price'] . $row['image']. "</p>";
//     }
// } else {
//     echo "<p>No items selected</p>";
// }
// }
