<!DOCTYPE html>
<html>
<head>
  <title>Passenger List</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    form {
      text-align: center;
    }

    label {
      font-weight: bold;
    }

    input[type="text"] {
      padding: 5px;
      margin: 10px;
    }

    input[type="submit"] {
      padding: 8px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    h2 {
      margin-top: 20px;
    }

    #passengerList {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h1>Retrieve Passenger List</h1>
  <form action="" method="post">
    <label for="flightNumber">Enter Flight Number:</label>
    <input type="text" id="flightNumber" name="flightNumber" required>
    <br>
    <input type="submit" value="Retrieve Passengers">
  </form>

  <h2>Passenger List</h2>
  <div id="passengerList">
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Retrieve the flight number from the form submission
      $flightNumber = $_POST["flightNumber"];

      $conn = new mysqli('localhost', 'root', '', 'flightbookingdb');
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT* FROM passengers2 p JOIN flight3 f ON p.passengerID = f.passengerID WHERE f.flightId = '$flightNumber'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo $row["firstName"] . "<br>";
        }
      } else {
        echo "No passenger found for the specified flight ID.";
      }

      $conn->close();
    }
    ?>
  </div>
</body>
</html>
