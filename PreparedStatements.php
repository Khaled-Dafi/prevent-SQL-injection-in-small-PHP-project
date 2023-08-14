/* 
In this example, we use prepared statements with placeholders (?) to separate the SQL query from the user input. 
The bind_param function binds the user input to the placeholders, preventing SQL injection. 
Always remember to validate and sanitize user inputs before using them in your code.
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use a prepared statement for insertion
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "User registered successfully.";
    } else {
        echo "Error: ". $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
