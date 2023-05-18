<?php
include("DBTicketBooking.php");
class viewBookingController
{
  private $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public function getUserIdByEmail($email)
  {
    $query = "SELECT user_id FROM login WHERE email = '$email'";
    $result = mysqli_query($this->conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      return $row['user_id'];
    } else {
      echo "Query failed: " . mysqli_error($this->conn);
      return null;
    }
  }

  public function getBookingsByUserId($userId)
  {
    $query = "SELECT b.*, m.movie_name FROM booking b
              INNER JOIN movies m ON b.movie_id = m.movie_id
              WHERE b.user_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    $result = $stmt->get_result();

    $bookings = array();

    while ($row = $result->fetch_assoc()) {
      $bookings[] = $row;
    }

    return $bookings;
  }

  public function addRatings($rating, $booking_id)
  {
      // Prepare the update statement
      $stmt = $this->conn->prepare("UPDATE booking SET review = WHERE booking_id = ?");  

      $stmt->bind_param("ii", $rating,$booking_id);
  
      // Execute the statement
      if ($stmt->execute()) {
          // Rating added successfully
          return true;
      } else {
          // Error occurred while adding rating
          return false;
      }
  }
  
}























?>