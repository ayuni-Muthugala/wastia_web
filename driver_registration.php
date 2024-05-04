<!DOCTYPE html>
<html lang="en">

<?php

session_start();
error_reporting(0);
include("connection/connect.php");
if (isset($_POST['submit'])) {
	if (
		empty($_POST['firstname']) ||
		empty($_POST['lastname']) ||
		empty($_POST['email']) ||
		empty($_POST['vnumber']) ||
		empty($_POST['phone']) ||
		empty($_POST['password']) ||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword'])
	) {
		$message = "All fields must be Required!";
	} else {

		$check_drivername = mysqli_query($db, "SELECT username FROM driver where username = '" . $_POST['username'] . "' ");
		$check_email = mysqli_query($db, "SELECT email FROM driver where email = '" . $_POST['email'] . "' ");



		if ($_POST['password'] != $_POST['cpassword']) {
			echo "<script>alert('Password not match');</script>";
		} elseif (strlen($_POST['password']) < 6) {
			echo "<script>alert('Password Must be >=6');</script>";
		} elseif (strlen($_POST['phone']) < 10) {
			echo "<script>alert('Invalid phone number!');</script>";
		} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo "<script>alert('Invalid email address please type a valid email!');</script>";
		} elseif (mysqli_num_rows($check_drivername) > 0) {
			echo "<script>alert('Username Already exists!');</script>";
		} elseif (mysqli_num_rows($check_email) > 0) {
			echo "<script>alert('Email Already exists!');</script>";
		} else {
			$mql = "INSERT INTO driver(username, f_name, l_name, email, phone, password, vnumber, status, date) VALUES('" . $_POST['username'] . "', '" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "', '" . md5($_POST['password']) . "', '" . $_POST['vnumber'] . "', '1', CURRENT_TIMESTAMP)";
			mysqli_query($db, $mql);
			header("refresh:0.1;url=./driver/index.php");
		}
	}
}


?>


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="#">
	<title>Driver Registration</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/animsition.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Site keywords here">
<meta name="description" content="">
<meta name='copyright' content=''>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Title -->
<title>Garbage Collector</title>

<!-- Favicon -->
<link rel="icon" href="img/favicon.png">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="css/nice-select.css">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- icofont CSS -->
<link rel="stylesheet" href="css/icofont.css">
<!-- Slicknav -->
<link rel="stylesheet" href="css/slicknav.min.css">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="css/owl-carousel.css">
<!-- Datepicker CSS -->
<link rel="stylesheet" href="css/datepicker.css">
<!-- Animate CSS -->
<link rel="stylesheet" href="css/animate.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="css/magnific-popup.css">

<!-- Medipro CSS -->
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/responsive.css">



<body>
	<!-- Header Area -->
	<header class="header">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-5 col-12">
					</div>
					<div class="col-lg-6 col-md-7 col-12">
						<!-- Top Contact -->
						<ul class="top-contact">
							<li><i class="fa fa-phone"></i>+94 703 558 963</li>
							<li><i class="fa fa-envelope"></i><a href="mailto:wastiya@yourmail.com">wastia@gmail.com</a></li>
						</ul>
						<!-- End Top Contact -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-12">
							<!-- Start Logo -->
							<div class="logo">
								<a href="index.php"><img src="images\logo.png" alt="#"></a>
							</div>
							<!-- End Logo -->
							<!-- Mobile Nav -->
							<div class="mobile-nav"></div>
							<!-- End Mobile Nav -->
						</div>
						<div class="col-lg-7 col-md-9 col-12">
							<!-- Main Menu -->
							<div class="main-menu">
								<nav class="navigation">
									<ul class="nav menu">
										<li><a href="index.php">Home </a></li>
										<li><a href="branchs.php">Branchers </a></li>
										<li><a href="./driver/index.php">Driver Area</a></li>
										<li><a href="./driver_registration.php">Register</a></li>
									</ul>
								</nav>
							</div>
							<!--/ End Main Menu -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!-- End Header Area -->
	<section class="contact-page inner-page">
		<div class="container ">
			<div class="row ">
				<div class="col-md-12">
					<div class="widget">
						<div class="widget-body">

							<style>
								/* Green theme styles */
								.form-group label {
									color: #0c531e;
									/* Dark green for text labels */
								}

								.form-control {
									border: 1px solid #0c531e;
									/* Dark green borders for input fields */
									color: #004d40;
									/* Darker text color for input text */
								}

								.form-control:focus {
									border-color: #66bb6a;
									/* Lighter green for border focus */
									box-shadow: 0 0 8px #66bb6a;
									/* Add a subtle glow effect */
								}

								.btn-info {
									background-color: #4caf50;
									/* Material Design Green */
									border-color: #4caf50;
									/* Same as background */
									color: white;
									/* White text */
								}

								.btn-info:hover {
									background-color: #43a047;
									/* A slightly darker green on hover */
									border-color: #43a047;
								}

								.form {
									border-top: 4px solid #4caf50;
									/* Green bar on top of the form */
									padding-top: 20px;
									/* Add some space above the form content */
								}
							</style>

							<form action="" method="post">
								<div class="row">
									<div class="form-group col-sm-12">
										<label for="exampleInputEmail1">User-Name</label>
										<input class="form-control" type="text" name="username" id="example-text-input">
									</div>
									<div class="form-group col-sm-6">
										<label for="exampleInputEmail1">First Name</label>
										<input class="form-control" type="text" name="firstname" id="example-text-input">
									</div>
									<div class="form-group col-sm-6">
										<label for="exampleInputEmail1">Last Name</label>
										<input class="form-control" type="text" name="lastname" id="example-text-input-2">
									</div>
									<div class="form-group col-sm-6">
										<label for="exampleInputEmail1">Email Address</label>
										<input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
									</div>
									<div class="form-group col-sm-6">
										<label for="exampleInputEmail1">Vehicle number</label>
										<input class="form-control" type="text" name="vnumber" id="example-tel-input-4">
									</div>
									<div class="form-group col-sm-6">
										<label for="exampleInputEmail1">Phone number</label>
										<input class="form-control" type="text" name="phone" id="example-tel-input-3">
									</div>
									<div class="form-group col-sm-6">
										<label for="exampleInputPassword1">Password</label>
										<input type="password" class="form-control" name="password" id="exampleInputPassword1">
									</div>
									<div class="form-group col-sm-6">
										<label for="exampleInputPassword1">Confirm password</label>
										<input type="password" class="form-control" name="cpassword" id="exampleInputPassword2">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<p><input type="submit" value="Register" name="submit" class="btn theme-btn" style="background-color: #4caf50; border-color: #4caf50; color: white;"></p>
									</div>
								</div>
							</form>

						</div>

					</div>

				</div>

			</div>
		</div>
	</section>


	<!-- Footer Area -->
	<footer id="footer" class="footer ">
		<!-- Footer Top -->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>About Us</h2>
							<p>Committed to revolutionizing waste management through innovation and technology. Our mission is to create sustainable solutions for a cleaner, greener future</p>
							<!-- Social -->
							<ul class="social">
								<li><a href="#"><i class="icofont-facebook"></i></a></li>
								<li><a href="#"><i class="icofont-google-plus"></i></a></li>
								<li><a href="#"><i class="icofont-twitter"></i></a></li>
								<li><a href="#"><i class="icofont-vimeo"></i></a></li>
								<li><a href="#"><i class="icofont-pinterest"></i></a></li>
							</ul>
							<!-- End Social -->
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer f-link">
							<h2>Quick Links</h2>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<ul>
										<li><a href="#"><i class="fa fa-eercast" aria-hidden="true"></i>Home</a></li>
										<li><a href="#"><i class="fa fa-eercast" aria-hidden="true"></i>Branchers</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>Open Hours</h2>
							<p>We're here to serve you Monday through Friday from 9:00 AM to 5:00 PM. Feel free to reach out during our open hours for assistance. Your convenience is our priority.</p>
							<ul class="time-sidual">
								<li class="day">Monday - Friday <span>8.00AM-5.00PM</span></li>
								<li class="day">Saturday <span>9.00-18.30</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>Contact</h2>
							<p>Contact us via email at wastia@gmail.com for inquiries and assistance.</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="email" placeholder="Email Address" class="common-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'" required="" type="email">
								<button class="button"><i class="icofont icofont-paper-plane"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Footer Top -->
		<!-- Copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="copyright-content">
							<p>© Copyright 2024 | All Rights Reserved by Ayuni</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Copyright -->
	</footer>
	<!--/ End Footer Area -->

	<script src="js/jquery.min.js"></script>
	<script src="js/tether.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/animsition.min.js"></script>
	<script src="js/bootstrap-slider.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/headroom.js"></script>
	<script src="js/itempicky.min.js"></script>
	<!-- jquery Min JS -->
	<script src="js/jquery.min.js"></script>
	<!-- jquery Migrate JS -->
	<script src="js/jquery-migrate-3.0.0.js"></script>
	<!-- jquery Ui JS -->
	<script src="js/jquery-ui.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap Datepicker JS -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Jquery Nav JS -->
	<script src="js/jquery.nav.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/jquery.scrollUp.min.js"></script>
	<!-- Niceselect JS -->
	<script src="js/niceselect.js"></script>
	<!-- Tilt Jquery JS -->
	<script src="js/tilt.jquery.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- counterup JS -->
	<script src="js/jquery.counterup.min.js"></script>
	<!-- Steller JS -->
	<script src="js/steller.js"></script>
	<!-- Wow JS -->
	<script src="js/wow.min.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- Counter Up CDN JS -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
</body>

</html>