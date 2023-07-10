<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve the login credentials from the form submission
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Perform authentication by checking the credentials against the admin table in your database
  $conn = new mysqli('localhost', 'root', '', 'flightbookingdb');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    // Authentication successful
    // Redirect the admin to the admin dashboard or any other relevant page
    header("Location: index.html");
    exit();
  } else {
    // Authentication failed
    echo "Invalid username or password.";
  }

  $conn->close();
}
?>
