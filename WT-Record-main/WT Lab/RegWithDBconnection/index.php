<?php
// Database configuration
$servername = "localhost"; // Your database host
$username = "root"; // Your database username
$password = "2503"; // Your database password
$dbname = "studentreg"; // Your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$name = $regno = $fname = $mname = $dob = $email = $phone = $course = "";
$img_destination = "uploads/default.jpg";   
$resume_destination = "uploads/default.pdf";

// Handle form data and file uploads
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strtoupper($_POST["name"]); // Convert to uppercase
    $regno = strtoupper($_POST["regno"]); // Convert to uppercase
    $fname = strtoupper($_POST["fname"]); // Convert to uppercase
    $mname = strtoupper($_POST["mname"]); // Convert to uppercase
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $course = $_POST["courselist"];

    // Handle image upload
    if (isset($_FILES["img-btn"]) && $_FILES["img-btn"]["error"] == 0) {
        $img_name = $_FILES["img-btn"]["name"];
        $img_tmp_name = $_FILES["img-btn"]["tmp_name"];
        $img_destination = "uploads/" . $regno . "_photo.jpg";

        // Move the uploaded image to a specified directory
        move_uploaded_file($img_tmp_name, $img_destination);
    }

    // Handle PDF resume upload
    if (isset($_FILES["res-btn"]) && $_FILES["res-btn"]["error"] == 0) {
        $resume_name = $_FILES["res-btn"]["name"];
        $resume_tmp_name = $_FILES["res-btn"]["tmp_name"];
        $resume_destination = "uploads/" . $regno . "_resume.pdf";

        // Move the uploaded PDF to a specified directory
        move_uploaded_file($resume_tmp_name, $resume_destination);
    }

    // Insert data into the database
    $sql = "INSERT INTO student_profiles (name, regno, fname, mname, dob, email, phone, course, image_path, resume_path) 
            VALUES ('$name', '$regno', '$fname', '$mname', '$dob', '$email', '$phone', '$course', '$img_destination', '$resume_destination')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="icon" href="./assets/Images/favicon.png" type="image/jpg">
    <link rel="stylesheet" href="./assets/Styles/styles.css">
</head>

<body>
    <main>
        <div id="container">
            <!-- PU LOGO -->
            <span class="pulogo">
                <img src="./assets/Images/pulogo.png" alt="pu logo" id="pulogoid">
                <label for="pulogoid">Pondicherry University</label>
            </span>

            <!-- Title -->
            <span class="title">
                <h3 class="title">Create Your University Account</h3>
            </span>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="name">
                    <input type="text" name="name" required>
                    <label class="placeholderlable" for="name">Name</label>
                </div>
                <div class="regno">
                    <input type="text" name="regno" required>
                    <label class="placeholderlable" for="regno">Register Number</label>
                </div>
                <div class="fname">
                    <input type="text" name="fname" required>
                    <label  class="placeholderlable" for="fname">Father Name</label>
                </div>
                <div class="mname">
                    <input type="text" name="mname" required>
                    <label  class="placeholderlable" for="mname">Mother Name</label>
                </div>
                <div class="dob">
                    <input type="date" name="dob" placeholder="none" value="25-03-2002" required>
                    <label class="placeholderlableactive" for="dob">Date of Birth</label>
                </div>
                <div class="email">
                    <input type="email" name="email" id="emailinput" required>
                    <label class="placeholderlable" id="emaillabel" for="email">Email</label>
                </div>
                <div class="phoneclass">
                    <input type="tel" name="phone" id="phone" min='10' max='10' required>
                    <label class="placeholderlable" id="phonelabid" for="phone">Phone Number</label>
                </div>
                <div class="course">
                    <select name="courselist" class="courselist">
                        <option value="bsc">Bachelor of Computer Science</option>
                        <option value="msc">Master of Computer Science</option>
                        <option value="mca">Master of Computer Applications</option>
                        <option value="mtechcs">Master of Technology in Computer Science</option>
                        <option value="mtechnis">Master of Technology in Networks and Information Security</option>
                    </select>
                    <label class="placeholderlableactive" for="courselist">Select the Course</label>
                </div>
                
                <div class="photoupload">
                    <input type="file" name="img-btn" id="img-btn" accept="image/*" hidden />
                    <label class="puloadlable" for="img-btn">Upload Photo</label>
                    <span id="img-chosen">No file chosen</span>
                </div>
                <br>
                <div class="resumeupload">
                    <input type="file" name="res-btn" id="res-btn" accept="application/pdf" hidden />
                    <label class="ruloadlable" for="res-btn">Upload Resume</label>
                    <span id="res-chosen">No file chosen</span>
                </div>
                <br>
                <input type="submit" value="Create Account">
            </form>
        </div>
    </main>
    <script src="./assets/Scripts/app.js"></script>
</body>

</html>
