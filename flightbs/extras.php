<?php
// Retrieve form data
$passengerID = $_POST['passengerID'];
$seatNumber = $_POST['seat-number'];
$baggageWeight = $_POST['baggage-weight'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement to insert data into the extras table
$stmt = $conn->prepare("INSERT INTO extra (passengerID, seatNumber, baggageWeight) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $passengerID, $seatNumber, $baggageWeight);

if ($stmt->execute()) {
    echo "Extra details saved successfully!";
    // Redirect to the next page
    header("Location: bookings.html");
    exit();
} else {
    echo "Error: Failed to save the extra details.";
}

$stmt->close();
$conn->close();
?>
