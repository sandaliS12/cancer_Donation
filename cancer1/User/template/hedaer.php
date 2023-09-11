<?php
include('check_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancer Foundtation</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../Icofont/icofont.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  

</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo ps-3">
        <h1><a href="index.php"><i class="fas fa-hand-holding-heart"></i>Apeksha Cancer Foundtation</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="about_Us.php">About Us</a></li>
          <li><a class="nav-link scrollto" href="contact_Us.php">Contact Us</a></li>
          <li class="dropdown"><a href="#"><span>Donations</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="blood_donation.php">Blood Donation</a></li>
              <li><a href="fund_donation.php">Fund Donation</a></li>
              <li><a href="food_donation.php">Drug Donation</a></li> 
              <li><a href="food_donation.php">Food Donation</a></li> 
              <li><a href="item_donation.php">Genral Item Donation</a></li>
            </ul>
            <li class="dropdown"><a href="#"><span>Others</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a class="nav-link scrollto" href="visitiing_Appoitment.php">Entertainment Activity</a></li>
              <li><a href="fund_donation.php">Volunteer Register</a></li>
             
            </ul>
          </li>
         
          <li class="dropdown dropleft"><a class="update_Uprofile"><span><?php echo $_SESSION['username']; ?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="dashboard.php">User Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->