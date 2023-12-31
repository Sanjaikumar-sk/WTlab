<?php
$servername = "localhost"; // usually "localhost"
$username = "root";
$password = "2503";
$dbname = "admission";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
