<?php

// Retrieve passenger ID from the form
$passengerID = $_POST['passengerID'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve information from passenger2 table
$passengerQuery = "SELECT firstName, lastName, passport, email, phone FROM passengers2 WHERE passengerID = ?";
$passengerStmt = $conn->prepare($passengerQuery);
$passengerStmt->bind_param("s", $passengerID);
$passengerStmt->execute();
$passengerResult = $passengerStmt->get_result();
$passengerData = $passengerResult->fetch_assoc();

// Retrieve information from flight3 table
$flightQuery = "SELECT departure, destination, departureDate FROM flight3 WHERE passengerID = ?";
$flightStmt = $conn->prepare($flightQuery);
$flightStmt->bind_param("s", $passengerID);
$flightStmt->execute();
$flightResult = $flightStmt->get_result();
$flightData = $flightResult->fetch_assoc();

// Retrieve information from meal2 table
$mealQuery = "SELECT foodType, beverageOption, dessert FROM meal2 WHERE passengerID = ?";
$mealStmt = $conn->prepare($mealQuery);
$mealStmt->bind_param("s", $passengerID);
$mealStmt->execute();
$mealResult = $mealStmt->get_result();
$mealData = $mealResult->fetch_assoc();

// Retrieve information from extra table
$extraQuery = "SELECT seatNumber, baggageWeight FROM extra WHERE passengerID = ?";
$extraStmt = $conn->prepare($extraQuery);
$extraStmt->bind_param("s", $passengerID);
$extraStmt->execute();
$extraResult = $extraStmt->get_result();
$extraData = $extraResult->fetch_assoc();

// Close prepared statements and database connection
$passengerStmt->close();
$flightStmt->close();
$mealStmt->close();
$extraStmt->close();
$conn->close();


?>
<!DOCTYPE html>
<html>
<head>
    <title>Passenger Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f5f5f5;
        }
        
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Passenger Information</h1>
        
        <?php
        // Place the PHP code here
        // ...

        // Display the retrieved information
        if ($passengerData && $flightData && $mealData && $extraData) {
            echo "<table>";
            echo "<tr><th>First Name</th><td>" . $passengerData['firstName'] . "</td></tr>";
            echo "<tr><th>Last Name</th><td>" . $passengerData['lastName'] . "</td></tr>";
            echo "<tr><th>Passport</th><td>" . $passengerData['passport'] . "</td></tr>";
            echo "<tr><th>Email</th><td>" . $passengerData['email'] . "</td></tr>";
            echo "<tr><th>Phone</th><td>" . $passengerData['phone'] . "</td></tr>";
            echo "<tr><th>Departure</th><td>" . $flightData['departure'] . "</td></tr>";
            echo "<tr><th>Destination</th><td>" . $flightData['destination'] . "</td></tr>";
            echo "<tr><th>Departure Date</th><td>" . $flightData['departureDate'] . "</td></tr>";
            echo "<tr><th>Food Type</th><td>" . $mealData['foodType'] . "</td></tr>";
            echo "<tr><th>Beverage Option</th><td>" . $mealData['beverageOption'] . "</td></tr>";
            echo "<tr><th>Dessert</th><td>" . $mealData['dessert'] . "</td></tr>";
            echo "<tr><th>Seat Number</th><td>" . $extraData['seatNumber'] . "</td></tr>";
            echo "<tr><th>Baggage Weight</th><td>" . $extraData['baggageWeight'] . "</td></tr>";
            echo "</table>";
        } else {
            echo "<p>No information found for the given passenger ID.</p>";
        }
        ?>

        <a href="index.html" class="button">Return to Home Page</a>
    </div>
</body>
</html>



