<?php
// Retrieve the passenger ID from the form
$passengerID = $_POST['passengerID'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Call the stored procedure to delete the passenger and associated records
$sql = "CALL DeletePassenger($passengerID)";
if ($conn->query($sql) === TRUE) {
    echo "Passenger and associated records have been deleted successfully.";
} else {
    echo "Failed to delete passenger: " . $conn->error;
}

$conn->close();
?>
