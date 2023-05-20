<?php
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../addMenuController.php";
class addMenuControllerTest extends Testcase {
    public function testaddMenu(){
        $conn = mysqli_connect("localhost", "root", "", "db_ticketbooking");
        if (!$conn) {
            die("Failed to connect to database.");
          }
        
          $account = new addMenuController($conn);
          $result1 = $account -> addMenu("7 Up", "drinks", "22", "image21");
          $result2 = $account -> addMenu("Cai tao kueh", "food", "44", "image25");
          $result3 = $account -> addMenu("Oat Milk", "food", "5", "image18");
          $result4 = $account -> addMenu("Ham jin peng", "food", "7", "image15");
          $result5 = $account -> addMenu("Chee cheong fan", "food", "2", "image33");
          $result6 = $account -> addMenu("Potato Chips", "food", "10", "image42");
          $result7 = $account -> addMenu("Orange", "food", "14", "image1");
          $result8 = $account -> addMenu("Lychee", "food", "29", "image7");
          $result9 = $account -> addMenu("Mcdonald", "food", "55", "image13");
          $result10 = $account ->addMenu("Bubble tea", "food", "70", "image31");  

        $this -> assertEquals(true, $result1);
        $this -> assertEquals(true, $result2);
        $this -> assertEquals(true, $result3);
        $this -> assertEquals(true, $result4);
        $this -> assertEquals(true, $result5);
        $this -> assertEquals(true, $result6);
        $this -> assertEquals(true, $result7);
        $this -> assertEquals(true, $result8);
        $this -> assertEquals(true, $result9);
        $this -> assertEquals(true, $result10);
    }
}
