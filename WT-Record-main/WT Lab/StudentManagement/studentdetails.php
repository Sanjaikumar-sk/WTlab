<!DOCTYPE html>
<?php
$currentPage = 'studentdetails.php';
?>

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
    <h1>Student Details</h1>

    <?php
    // Include the database connection
    include('dbconnection.php');

    // Fetch all student records
    $query = "SELECT * FROM students";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
    ?>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Course</th>
            <th>Fee Payment</th>
            <th>Due Date</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo isset($row['name']) ? $row['name'] : ''; ?></td>
              <td><?php echo isset($row['email']) ? $row['email'] : ''; ?></td>
              <td><?php echo isset($row['phone_number']) ? $row['phone_number'] : ''; ?></td>
              <td><?php echo isset($row['gender']) ? $row['gender'] : ''; ?></td>
              <td><?php echo isset($row['date_of_birth']) ? $row['date_of_birth'] : ''; ?></td>
              <td><?php echo isset($row['address']) ? $row['address'] : ''; ?></td>
              <td><?php echo isset($row['course']) ? $row['course'] : ''; ?></td>
              <td><?php echo isset($row['feepayment']) ? ($row['feepayment'] ? 'Paid' : 'Not Paid') : ''; ?></td>
              <td><?php echo isset($row['due_date']) ? $row['due_date'] : ''; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>No student records found.</p>
    <?php } ?>

  </div>

</body>

</html>
