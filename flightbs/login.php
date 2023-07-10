<?php
// Retrieve username and password from the form submission
$username = $_POST['username'];
$password = $_POST['password'];

// Perform your login validation logic here
if ($username === 'ciu' && $password === 'ciu') {
  // Successful login
  header('Location: index.html');
  exit();
} else if ($username === 'Mahmud' && $password === '1234') {
  // Successful login
  header('Location: index.html');
exit();}
else {
  // Failed login
  echo 'Invalid username or password.';
}
?>
