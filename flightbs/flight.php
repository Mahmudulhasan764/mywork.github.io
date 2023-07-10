<?php





$departure = $_POST['departure'];
$destination = $_POST['destination'];
$departuredate = $_POST['departuredate'];

// Database connection
$conn = new mysqli('localhost','root','','flightbookingdb');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed: ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO flight (departure, destination, departuredate) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $departure, $destination, $departuredate);
    $execval = $stmt->execute();
    $stmt->close();
    $conn->close();
    
    if ($execval) {
        echo "Registration successful...";
        // Redirect to next page
        header("Location: passenger.html");
        exit(); // Make sure to exit after redirection
    } else {
        echo "Registration failed.";
    }
}


	/*$departure = $_POST['departure'];
	$destination = $_POST['destination'];
	$departuredate = $_POST['departuredate'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','flightbookingdb');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into flight(departure, destination, departuredate) values(?, ?, ?)");
		$stmt->bind_param("sss", $departure, $destination, $departuredate );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}*/
?> 