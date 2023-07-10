<?php

ob_start(); // Start output buffering

// Retrieve values from the form
$passengerID = $_POST['passengerID'];
$flightId = $_POST['flightId'];
$departure = $_POST['departure'];
$destination = $_POST['destination'];
$departureDate = $_POST['departuredate'];
$price = $_POST['price'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO flight3 (flightId, departure, destination, departureDate, price, passengerID) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssdi", $flightId, $departure, $destination, $departureDate, $price, $passengerID);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Passenger registered successfully!";
	 header("Location: meal.html");
    exit();
} else {
    echo "Error registering passenger.";
}

$stmt->close();
$conn->close();



?>




