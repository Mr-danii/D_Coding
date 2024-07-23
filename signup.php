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
$phone_number = $_POST['phone_number'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
$confirm_password = password_hash($_POST['confirm_password'], PASSWORD_BCRYPT); // Hash the confirm password
$cnic = $_POST['cnic'];
$qualifications = $_POST['qualifications'];

// Insert data into the signup table
$sql = "INSERT INTO signup (email, phone_number, password, confirm_password, cnic, qualifications)
VALUES ('$email', '$phone_number', '$password', '$confirm_password', '$cnic', '$qualifications')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
