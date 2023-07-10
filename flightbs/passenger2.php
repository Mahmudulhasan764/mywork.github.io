<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$passengerId = $_POST['passengerId'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$passport = $_POST['passport'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO passengers2 (passengerID, firstName, lastName, passport, email, phone) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssi", $passengerId, $firstName, $lastName, $passport, $email, $phone);
$stmt->execute();

// Check if the record was inserted successfully
if ($stmt->affected_rows > 0) {
    echo "Passenger registered successfully!";
	 header("Location: flight2.html");
    exit();
} else {
    echo "Error registering passenger.";
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>


