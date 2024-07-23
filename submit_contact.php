<?php
$servername = "localhost";
$username = "root"; // change to your database username
$password = ""; // change to your database password
$dbname = "dcoders_heaven";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_form (email, password, query1, query2, city, feedback) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $email, $password, $query1, $query2, $city, $feedback);

// Set parameters and execute
$email = $_POST['email'];
$password = $_POST['password'];
$query1 = $_POST['query1'];
$query2 = $_POST['query2'];
$city = $_POST['city'];
$feedback = isset($_POST['feedback']) ? 1 : 0;

$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>
