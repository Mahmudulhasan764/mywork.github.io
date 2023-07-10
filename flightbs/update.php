<?php
// Retrieve the passengerID and other details from the HTML form
$passengerID = $_POST['passengerID'];
$foodType = $_POST['foodType'];
$beverageOption = $_POST['beverageOption'];
$dessert = $_POST['dessert'];
$seatNumber = $_POST['seatNumber'];
$baggageWeight = $_POST['baggageWeight'];



$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Call the uupdatefoodseat function
$sql = "SELECT updatefoodseat($passengerID, '$foodType', '$beverageOption', '$dessert', '$seatNumber', '$baggageWeight') AS message";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['message']; 
		header('Location: endgame2.html');
  exit();
    }
} else {
    header('Location: endgame2.html');
  exit();
}

$conn->close();
?>
