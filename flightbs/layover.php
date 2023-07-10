<?php
// Retrieve form data
$service_id = $_POST['service_id'];
$flightId = $_POST['flightId'];
$service_name = $_POST['service_name'];
$service_cost = $_POST['service_cost'];
$passengerID = $_POST['passengerID'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the stored procedure
$stmt = $conn->prepare("CALL InsertLayoverService(?, ?, ?, ?, ?)");
$stmt->bind_param("iisdi", $service_id, $flightId, $service_name, $service_cost, $passengerID);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Layover service added successfully.";
	header('Location: endgame2.html');
  exit();
} else {
	header('Location: endgame2.html');
  exit();
    echo "Failed to add layover service.";
}

$stmt->close();
$conn->close();
?>
