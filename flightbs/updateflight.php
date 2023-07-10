<?php
// Retrieve the passengerID and other details from the HTML form
$passengerID = $_POST['passengerID'];
$departure = $_POST['departure'];
$destination = $_POST['destination'];
$departureDate = $_POST['departureDate'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$passport = $_POST['passport'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Call the updatePassengerFlightDetails stored procedure
$sql = "CALL updatePassengerFlightDetails($passengerID, '$departure', '$destination', '$departureDate', '$firstName', '$lastName', '$passport', '$email', '$phone')";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row['msg']; // Display the message returned by the stored procedure
			header('Location: endgame2.html');
  exit();
        }
    } else {
        header('Location: endgame2.html');
  exit();
    }
} else {
   header('Location: endgame2.html');
  exit();
}

$conn->close();
?>
