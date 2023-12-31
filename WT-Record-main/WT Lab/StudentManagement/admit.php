<?php
$currentPage = 'admit.php';

// Include the database connection
include('dbconnection.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $fathers_name = $_POST["fathers_name"];
    $gender = $_POST["gender"];
    $date_of_birth = $_POST["date_of_birth"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $course = $_POST["course"];
    $country = $_POST["country"];

    // Insert data into the students table
    $sql = "INSERT INTO students (name, fathers_name, gender, date_of_birth, email, phone_number, address, course, country)
            VALUES ('$name', '$fathers_name', '$gender', '$date_of_birth', '$email', '$phone_number', '$address', '$course', '$country')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Admission</title>
    <link rel="stylesheet" href="./assets/styles.css">
    <?php include('bootstrap.php'); ?>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <h1>Admit Students</h1>

        <!-- Admission Form -->
        <form id="admissionForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="fathers_name">Father's Name:</label>
                <input type="text" class="form-control" name="fathers_name" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" name="date_of_birth" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" class="form-control" name="phone_number" id="phone_number" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" required></textarea>
            </div>

            <div class="form-group">
                <label for="course">Course:</label>
                <select class="form-control" name="course" required>
                    <option value="M.Sc CS">M.Sc CS</option>
                    <option value="MCA">MCA</option>
                    <option value="M.Tech CS">M.Tech CS</option>
                </select>
            </div>

            <div class="form-group">
                <label for="country">Country:</label>
                <select class="form-control" name="country" required>
                    <option value="India">India</option>
                    <option value="United States">United States</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <!-- Add more countries as needed -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Include the JavaScript file -->
    <script src="./assets/app.js"></script>
</body>

</html>
