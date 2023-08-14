/*
Using mysqli_real_escape_string() is a way to sanitize and escape user inputs before using them in SQL queries. 
While it can provide some level of protection against SQL injection, 
using prepared statements is generally considered more secure.
*/



<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows === 1) {
    // Successful login
} else {
    // Failed login
}

$conn->close();
?>
