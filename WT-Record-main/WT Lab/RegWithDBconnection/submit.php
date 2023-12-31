<?php
// Database configuration
$servername = "localhost:3306";
$username = "root";
$password = "2503";
$dbname = "studentreg";
// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form data
if ($_SERVER["REQUEST_METHOD"] == "GET") {
$name = $_GET["name"];
    $regno = $_GET["regno"];
    $fname = $_GET["fname"];
    $mname = $_GET["mname"];
    $dob = $_GET["dob"];
    $email = $_GET["email"];
    $phone = $_GET["phone"];
    $course = $_GET["courselist"]; // Access the "courselist" field using its name

    // Handle image upload
    if (isset($_FILES["img-btn"]) && $_FILES["img-btn"]["error"] == 0) {
        $img_name = $_FILES["img-btn"]["name"];
        $img_tmp_name = $_FILES["img-btn"]["tmp_name"];
        $img_destination = "uploads/" . $img_name;
        
        // Move the uploaded image to a specified directory
        move_uploaded_file($img_tmp_name, $img_destination);
    } else {
        $img_destination = "uploads/default.jpg"; // Set a default image path
    }
    
    // Handle PDF resume upload
    if (isset($_FILES["res-btn"]) && $_FILES["res-btn"]["error"] == 0) {
        $resume_name = $_FILES["res-btn"]["name"];
        $resume_tmp_name = $_FILES["res-btn"]["tmp_name"];
        $resume_destination = "uploads/" . $resume_name;
        
        // Move the uploaded PDF to a specified directory
        move_uploaded_file($resume_tmp_name, $resume_destination);
    } else {
        $resume_destination = "uploads/default.pdf"; // Set a default PDF path
    }
    
    // Insert data into the database
    $sql = "INSERT INTO student_profiles (name, regno, fname, mname, dob, email, phone, course, image_path, resume_path) 
            VALUES ('$name', '$regno', '$fname', '$mname', '$dob', '$email', '$phone', '$course', '$img_destination', '$resume_destination')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
}
?>