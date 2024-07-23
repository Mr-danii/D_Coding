<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dcoders_heaven";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Retrieve the user from the signup table
$sql = "SELECT password FROM signup WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "success";
    } else {
        echo "Invalid credentials";
    }
} else {
    echo "Invalid credentials";
}

$conn->close();
?>
