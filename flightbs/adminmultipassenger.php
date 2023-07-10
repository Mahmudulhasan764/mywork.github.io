<!DOCTYPE html>
<html>
<head>
  <title>Passenger Bookings</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      margin-bottom: 20px;
    }

    form {
      margin-bottom: 20px;
    }

    #bookingList {
      border: 1px solid #ccc;
      padding: 10px;
    }

    p {
      margin: 5px 0;
    }
  </style>
</head>
<body>
  <h1>Passenger Bookings</h1>
  <form action="" method="post">
    <input type="submit" value="Retrieve Bookings">
  </form>

  <h2>Passenger Bookings</h2>
  <div id="bookingList">
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $conn = new mysqli('localhost', 'root', '', 'flightbookingdb');
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT p.firstName, COUNT(b.bookingID) AS numBookings
              FROM passengers2 p
              JOIN bookings b ON p.passengerID = b.passengerID
              GROUP BY p.passengerID, p.firstName";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<p>{$row['firstName']}: {$row['numBookings']} bookings</p>";
        }
      } else {
        echo "<p>No bookings found.</p>";
      }

      $conn->close();
    }
    ?>
  </div>
</body>
</html>
