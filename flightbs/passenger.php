<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$passport = $_POST['passport'];
$phone = $_POST['phone'];
$flightId = $_POST['flightId']; // Assuming flight ID is provided through a form input

// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO passengers (flight_id, firstName, lastName, passport, email, phone) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $flightId, $firstName, $lastName, $passport, $email, $phone);
    $execval = $stmt->execute();
    if ($execval) {
        echo "Registration successful...";
        // Redirect to next page
        header("Location: meal.html");
        exit();
    } else {
        echo "Registration failed.";
    }
    $stmt->close();
    $conn->close();
}


/*$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$passport = $_POST['passport'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','flightbookingdb');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO passengers(firstName, lastName, email, passport, number) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $firstName, $lastName, $email, $passport, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}*/
?>
