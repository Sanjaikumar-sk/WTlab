<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="./assets/img/pulogo.png" alt="pulogo" style="height: 35px; margin-right: 10px;">
        Pondicherry University
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>"
                href="index.php">Home </a>
            <a class="nav-item nav-link <?php echo ($currentPage == 'admit.php') ? 'active' : ''; ?>"
                href="admit.php">Admit Students</a>
            <a class="nav-item nav-link <?php echo ($currentPage == 'feepayment.php') ? 'active' : ''; ?>"
                href="feepayment.php">Pay Fees</a>
            <a class="nav-item nav-link <?php echo ($currentPage == 'studentdetails.php') ? 'active' : ''; ?>"
                href="studentdetails.php">Student Details</a>
            <a class="nav-item nav-link <?php echo ($currentPage == 'contactus.php') ? 'active' : ''; ?>"
                href="contactus.php">Contact us</a>
        </div>
    </div>
</nav>
