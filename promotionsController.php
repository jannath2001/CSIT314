<?php
include("DBTicketBooking.php");

class RewardsController
{
    private $conn;
    private $pointRemain;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function displayRewards()
    {
        $rewards = array();

        $sql = "SELECT * FROM rewards";
        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rewards[] = $row;
            }
        }

        return $rewards;
    }

    public function redeemRewards($reward_Point)
    {
        $user_id = $_SESSION['user_id'];
        $sql1 = "SELECT * FROM loyalty_member WHERE user_id = $user_id";
        $result1 = mysqli_query($this->conn, $sql1);

        if ($result1) {
            while ($row = mysqli_fetch_assoc($result1)) {
                if ($row['points'] > $reward_Point) {
                    $pointRemain = $row['points'] - $reward_Point;
                    $sql2 = "UPDATE loyalty_member SET points = $pointRemain WHERE user_id = $user_id";
                    $result2 = mysqli_query($this->conn, $sql2);
                    if (!$result2) {
                        echo '<script>alert("Error Redeeming Reward")</script>';
                        die("Error: " . mysqli_error($this->conn));
                    } else {
                        echo '<script>alert("Successfully Redeemed Reward")</script>';
                    }
                } else {
                    echo '<script>alert("Insufficient Points")</script>';
                }
            }
        }
    }
}
?>