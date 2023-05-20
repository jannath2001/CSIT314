<?php
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../addRewardController.php";
class addRewardControllerTest extends Testcase {
    public function testaddReward(){
        $conn = mysqli_connect("localhost", "root", "", "db_ticketbooking");
        if (!$conn) {
            die("Failed to connect to database.");
          }
        
        $account = new addRewardController($conn);
        $result1 = $account -> addReward("$1 off", "minus $1", "image233", "233", "444");
        $result2 = $account -> addReward("$2 off", "minus $2", "image999", "992", "999");
        $result3 = $account -> addReward("$3 off", "minus $3", "image959", "1000", "9990");
        $result4 = $account -> addReward("$4 off", "minus $4", "image101", "18", "21");
        $result5 = $account -> addReward("$6 off", "minus $6", "image307", "631", "631");
        $result6 = $account -> addReward("$7 off", "minus $7", "image3", "6", "3");
        $result7 = $account -> addReward("$8 off", "minus $8", "image3", "21", "34");
        $result8 = $account -> addReward("$9 off", "minus $9", "image344", "241", "3444");
        $result9 = $account -> addReward("$11 off", "minus $11", "image344", "1111", "2222");
        $result10 = $account -> addReward("$12 off", "minus $12", "image108", "181", "208");

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
