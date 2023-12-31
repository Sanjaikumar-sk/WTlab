<?php
$currentPage = 'index.php';
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
    <div>
      <img class="pulogo" src="./assets/img/pulogo.png" alt="pulogo">
    </div>
    <br>
    <h1>Welcome to Pondicherry University</h1>
    <p>Pondicherry University is a central university in Puducherry, India. Established by an Act of Parliament in 1985,
      it offers a wide range of undergraduate and postgraduate programs across various disciplines.</p>

    <h2>Our Vision</h2>
    <p>To provide quality education and promote research in diverse fields, fostering a spirit of innovation and global
      understanding.</p>

    <h2>Admission Information</h2>
    <p>If you are interested in joining Pondicherry University, explore our programs and admission process on our
      website. We look forward to welcoming talented students to our vibrant academic community.</p>

    <hr>
    <a href="admit.php"><button type="button" class="btn btn-primary">Admission</button></a>
    <a href="feepayment.php"><button type="button" class="btn btn-warning">Pay Fees</button></a>
    <a href="studentdetails.php"><button type="button" class="btn btn-success">Student Details</button></a>
    <a href="contactus.php"><button type="button" class="btn btn-info">Contact us</button></a>


  </div>

</body>

</html>