<?php
// Retrieve passenger ID from the form
$passengerID = $_POST['passengerID'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the calculated total price
$result = $conn->query("SELECT @flightotalPrice AS TotalPrice");
$row = $result->fetch_assoc();
$totalPrice = $row['TotalPrice'];

// Retrieve form data
$cardNumber = $_POST['cardNumber'];
$nameOnCard = $_POST['nameOnCard'];
$expiryDate = $_POST['expiryDate'];

// Prepare the insert statement
$stmt = $conn->prepare("INSERT INTO payment (passengerID, cardNumber, nameOnCard, expiryDate, totalAmount) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("isssd", $passengerID, $cardNumber, $nameOnCard, $expiryDate, $totalPrice);

// Execute the insert statement
$stmt->execute();

// Check if the payment details were inserted successfully
if ($stmt->affected_rows > 0) {
    echo "Payment details saved successfully.";
	 header("Location: endgame.html");
    exit();
} else {
    echo "Error saving payment details.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>











