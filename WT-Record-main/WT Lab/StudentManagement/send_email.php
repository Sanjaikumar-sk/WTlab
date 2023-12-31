<?php
// Include the database connection
include('dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // You may want to add additional validation and sanitation here

    // Insert the submission into the database
    $insertQuery = "INSERT INTO contact_submissions (name, email, message) VALUES ('$name', '$email', '$message')";
    $conn->query($insertQuery);

    echo "Thank you for contacting us! Your message has been submitted successfully.";
} else {
    // If not a POST request, redirect to the contact page
    header("Location: contactus.php");
    exit();
}
?>
