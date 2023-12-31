<?php
$currentPage = 'feepayment.php';

// Include the database connection
include('dbconnection.php');

// Function to calculate fine based on due date
function calculateFine($dueDate) {
    $currentDate = date('Y-m-d');
    $daysLate = max(0, strtotime($currentDate) - strtotime($dueDate)) / (60 * 60 * 24);
    $fineAmount = $daysLate * 50; // Assuming a fine of 50 Rs per day
    return $fineAmount;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phoneNumber = $_POST["phone_number"];

    // Retrieve student details
    $studentQuery = "SELECT * FROM students WHERE phone_number = '$phoneNumber'";
    $studentResult = $conn->query($studentQuery);

    if ($studentResult->num_rows > 0) {
        $student = $studentResult->fetch_assoc();

        // Calculate fine if payment is overdue
        $dueDate = $student['due_date'];
        $fineAmount = calculateFine($dueDate);

        // Display fee details based on the course
        switch ($student['course']) {
            case 'M.Sc CS':
                $courseFee = 30000;
                break;
            case 'M.Tech CS':
                $courseFee = 40000;
                break;
            case 'MCA':
                $courseFee = 25000;
                break;
            default:
                $courseFee = 0;
        }

        // Add fine to the total course fee
        $totalAmount = $courseFee + $fineAmount;
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
        <h1>Fee Payment</h1>

        <!-- Fee Payment Form -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="phone_number">Enter Phone Number:</label>
                <input type="tel" class="form-control" name="phone_number" required>
            </div>

            <button type="submit" class="btn btn-primary">Check Fees</button>
        </form>

        <?php if (isset($student)): ?>
            <div class="alert alert-info mt-4">
                <p><strong>Name:</strong> <?php echo $student['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $student['phone_number']; ?></p>
                <p><strong>Course:</strong> <?php echo $student['course']; ?></p>
                <p><strong>Fee Paid:</strong> <?php echo ($student['feepayment']) ? 'Yes' : 'No'; ?></p>

                <?php if (!$student['feepayment']): ?>
                    <p><strong>Due Date:</strong> <?php echo $student['due_date']; ?></p>
                    <p><strong>Course Fee:</strong> <?php echo $courseFee; ?> Rs</p>
                    <p><strong>Fine Amount:</strong> <?php echo $fineAmount; ?> Rs</p>
                    <p><strong>Total Amount:</strong> <?php echo $totalAmount; ?> Rs</p>

                    <form method="post" action="payfees.php">
                        <input type="hidden" name="phone_number" value="<?php echo $phoneNumber; ?>">
                        <input type="hidden" name="course_fee" value="<?php echo $totalAmount; ?>">
                        <button type="submit" class="btn btn-primary">Pay Fees</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
