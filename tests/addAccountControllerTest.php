<?php
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../addAccountController.php";


class addAccountControllerTest extends Testcase {

    public function testaddAccount() {
        $conn = mysqli_connect("localhost", "root", "", "db_ticketbooking");
        if (!$conn) {
            die("Failed to connect to database.");
          }
        $account = new addAccountController($conn);
        $result1 = $account -> addAccount("manager@gmail.com", "ff123", "manager");
        $result2 = $account -> addAccount("abc@gmail.com", "ggg1123", "loyaltyMember");
        $result3 = $account -> addAccount("staff@gmail.com", "gg112233", "staff");
        $result4 = $account -> addAccount("sysadmin@gmail.com", "g1233", "systemAdmin");
        $result5 = $account -> addAccount("abc1@gmail.com", "1233gg", "loyaltyMember");
        $result6 = $account -> addAccount("staff1@gmail.com", "112233", "staff");
        $result7 = $account -> addAccount("manager2@gmail.com", "ggg1233", "manager");
        $result8 = $account -> addAccount("abc2@gmail.com", "fff1233", "loyaltyMember");
        $result9 = $account -> addAccount("staff2@gmail.com", "112fdf233", "staff");
        $result10 = $account ->addAccount("abc3@gmail.com", "112fff", "loyaltyMember");
        
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