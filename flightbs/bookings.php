<?php


// Retrieve values from the form
$passengerID = $_POST['passengerID'];
$flightId = $_POST['flightId'];
$bookingDate = $_POST['bookingDate'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO bookings (passengerID, flightId, bookingDate) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $passengerID, $flightId, $bookingDate);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Booking successful...";
    // Redirect to next page
    header("Location: payment.html");
    exit();
} else {
    echo "Booking failed.";
}

$stmt->close();
$conn->close();
?>
