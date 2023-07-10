




  <?php
// Retrieve passenger ID from the form
$passengerID = $_POST['passengerID'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the stored procedure call
$stmt = $conn->prepare("CALL CalculateTotalPrice(?, @flightotalPrice)");
$stmt->bind_param("i", $passengerID);

// Execute the stored procedure
$stmt->execute();

// Retrieve the calculated total price
$result = $conn->query("SELECT @flightotalPrice AS TotalPrice");
$row = $result->fetch_assoc();
$totalPrice = $row['TotalPrice'];

// Retrieve the passenger's name
$passengerQuery = "SELECT firstName, lastName FROM passengers2 WHERE passengerID = $passengerID";
$passengerResult = $conn->query($passengerQuery);
$passengerRow = $passengerResult->fetch_assoc();
$firstName = $passengerRow['firstName'];
$lastName = $passengerRow['lastName'];

// Close the database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment Details</title>
  <link rel="stylesheet" type="text/css" href="payment.css">
</head>
<body>
  <div class="container">
    <h1>Payment Details</h1>
    <div class="details">
      <p><strong>Passenger Name:</strong> <?php echo $firstName . ' ' . $lastName; ?></p>
      <p><strong>Total Price:</strong> $<?php echo $totalPrice; ?></p>
    </div>
    <form action="payment2.php" method="post">
    
      <div class="form-group">
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required>
      </div>
      <div class="form-group">
        <label for="nameOnCard">Name on Card:</label>
        <input type="text" id="nameOnCard" name="nameOnCard" required>
      </div>
      <div class="form-group">
  <label for="expiryDate">Expiry Date:</label>
  <input type="date" id="expiryDate" name="expiryDate" required>
</div>
      
      <input type="submit" value="Pay Now">
    </form>
  </div>
</body>
</html>

  

    