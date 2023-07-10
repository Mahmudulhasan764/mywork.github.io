<?php
// Retrieve values from the form
$passengerID = $_POST['passengerID'];
$foodType = $_POST['food-type'];
$beverageOption = $_POST['beverage-option'];
$dessert = $_POST['dessert'];
$quantity = $_POST['quantity'];

// Calculate the total price based on selected options
$price = 0;
if ($foodType === "Sandwich") {
    $price += 5;
} elseif ($foodType === "Burger") {
    $price += 6;
} elseif ($foodType === "Pizza") {
    $price += 8;
}

if ($beverageOption === "Water") {
    $price += 1;
} elseif ($beverageOption === "Soda") {
    $price += 2;
} elseif ($beverageOption === "Juice") {
    $price += 3;
}

if ($dessert === "Cake") {
    $price += 4;
} elseif ($dessert === "Ice Cream") {
    $price += 3;
} elseif ($dessert === "Pudding") {
    $price += 2;
}

$totalPrice = $price * $quantity;

// Database connection
$conn = new mysqli('localhost', 'root', '', 'flightbookingdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO meal2 (passengerID, foodType, beverageOption, dessert, quantity, totalPrice) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssii", $passengerID, $foodType, $beverageOption, $dessert, $quantity, $totalPrice);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Meal details stored successfully.";
    // Redirect to next page
    header("Location: extras.html");
    exit();
} else {
    echo "Failed to store meal details.";
}

$stmt->close();
$conn->close();
?>




