<?php
// Include the database connection
include('dbconnection.php');

// Function to calculate fine based on due date
function calculateFine($dueDate) {
    $currentDate = date('Y-m-d');
    $daysLate = max(0, strtotime($currentDate) - strtotime($dueDate)) / (60 * 60 * 24);
    $fineAmount = $daysLate * 50; // Assuming a fine of 50 Rs per day
    return $fineAmount;
}

// Initialize variables for success message
$successMessage = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phoneNumber = $_POST["phone_number"];
    $courseFee = $_POST["course_fee"];

    // Retrieve student details
    $studentQuery = "SELECT * FROM students WHERE phone_number = '$phoneNumber'";
    $studentResult = $conn->query($studentQuery);

    if ($studentResult->num_rows > 0) {
        $student = $studentResult->fetch_assoc();

        // Calculate fine if payment is overdue
        $dueDate = $student['due_date'];
        $fineAmount = calculateFine($dueDate);

        // Insert payment details into the transaction table
        $insertQuery = "INSERT INTO transaction (name, phone_number, amount, date, time)
                        VALUES ('{$student['name']}', '$phoneNumber', $courseFee, CURDATE(), CURTIME())";
        $conn->query($insertQuery);

        // Update fees paid status in students table
        $updateQuery = "UPDATE students SET feepayment = TRUE WHERE phone_number = '$phoneNumber'";
        $conn->query($updateQuery);

        $successMessage = 'Fee paid successfully!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Payment</title>
    <link rel="stylesheet" href="./assets/styles.css">
    <?php include('bootstrap.php'); ?>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <?php if ($successMessage): ?>
            <div class="alert alert-success">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
