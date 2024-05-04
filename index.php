<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!empty($_POST["submit"])) {
		$loginquery = "SELECT * FROM users WHERE username='$username' && password='" . md5($password) . "'"; //selecting matching records
		$result = mysqli_query($db, $loginquery); //executing
		$row = mysqli_fetch_array($result);

		if (is_array($row)) {
			$_SESSION["user_id"] = $row['u_id'];
			header("refresh:1;url=index.php");
		} else {
			$message = "Invalid Username or Password!";
		}
	}
}
?>

<head>
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

</head>

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
							<li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com">wastia@gmail.com</a></li>
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
								<a href="index.php"><img src="images/logo.png" alt="#"></a>
							</div>
							<!-- End Logo -->
							<!-- Mobile Nav -->
							<div class="mobile-nav"></div>
							<!-- End Mobile Nav -->
						</div>
						<div class="col-lg-9 col-md-9 col-12">
							<!-- Main Menu -->
							<div class="main-menu">
								<nav class="navigation">
									<ul class="nav menu">
										<li><a href="index.php">Home</a></li>
										<li><a href="./branches.php">Branches</a></li>
										<?php
										if (empty($_SESSION["user_id"])) {
											echo '<li><a href="login.php">Login</a></li>';
											echo '<li><a href="registration.php">Register</a></li>';
										} else {
											echo '<li><a href="your_orders.php">My Orders</a></li>';
											echo '<li><a href="logout.php">Logout</a></li>';
										}
										?>
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




	<!-- Slider Area -->
	<section class="slider">
		<div class="hero-slider">
			<!-- Start Single Slider -->
			<div class="single-slider" style="background-image:url('img/1slider.jpg')">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="text">
								<h1>We Provides <span>Safe</span> And <span>Reliable</span>Waste Collection</h1>
								<p>At wastia, we prioritize safety and reliability in waste collection. Our innovative IoT technology ensures that waste management is not just efficient but also safe for both the environment and communities</p>
								<div class="button">
									<a href="./branches.php" class="btn">Pick Up Garbage</a>
									<a href="./driver_registration.php" class="btn primary">Join as a Driver</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slider -->
			<!-- Start Single Slider -->
			<div class="single-slider" style="background-image:url('img/2slider.jpg')">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="text">
								<h1>We Provides <span>Safe</span> And <span>Reliable</span>Waste Collection</h1>
								<p>At wastia, we prioritize safety and reliability in waste collection. Our innovative IoT technology ensures that waste management is not just efficient but also safe for both the environment and communities</p>
								<div class="button">
									<a href="./branches.php" class="btn">Pick Up Garbage</a>
									<a href="./driver_registration.php" class="btn primary">Join as a Driver</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Start End Slider -->
			<!-- Start Single Slider -->
			<div class="single-slider" style="background-image:url('img/3slider.jpg')">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="text">
								<h1>We Provides <span>Safe</span> And <span>Reliable</span>Waste Collection</h1>
								<p>At wastia, we prioritize safety and reliability in waste collection. Our innovative IoT technology ensures that waste management is not just efficient but also safe for both the environment and communities</p>
								<div class="button">
									<a href="./branches.php" class="btn">Pick Up Garbage</a>
									<a href="./driver_registration.php" class="btn primary">Join as a Driver</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slider -->
		</div>
	</section>
	<!--/ End Slider Area -->

	<!-- Start Schedule Area -->
	<section class="schedule">
		<div class="container">
			<div class="schedule-inner">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-12 ">
						<!-- single-schedule -->
						<div class="single-schedule first">
							<div class="inner">
								<div class="icon">
									<i class="icofont-recycle"></i>
								</div>
								<div class="single-content">
									<span>category 01</span>
									<h4>Recyclable Waste</h4>
									<p>• Paper <br> • Plastic bottles and containers <br>• Glass <br>• Metal cans </p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- single-schedule -->
						<div class="single-schedule middle">
							<div class="inner">
								<div class="icon">
									<i class="icofont-radio"></i>
								</div>
								<div class="single-content">
									<span>category 02</span>
									<h4>Electronic Waste (E-Waste)</h4>
									<p>• Paper <br> • Plastic bottles and containers <br>• Glass <br>• Metal cans </p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-12 col-12">
						<!-- single-schedule -->
						<div class="single-schedule last">
							<div class="inner">
								<div class="icon">
									<i class="icofont-ui-clock"></i>
								</div>
								<div class="single-content">
									<span>category 03</span>
									<h4>Hazardous Waste</h4>
									<p>• Paper <br> • Plastic bottles and containers <br>• Glass <br>• Metal cans </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/End Start schedule Area -->

	<!-- Start Why choose -->
	<section class="why-choose section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>We Offer Different Services To Improve Your Waste Management Experience</h2>
						<p>we understand the importance of efficient waste management in maintaining cleanliness, promoting sustainability, and enhancing overall quality of life. That's why we offer a range of services designed to streamline waste management processes and optimize resource utilization.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-12">
					<!-- Start Choose Left -->
					<div class="choose-left">
						<h3>Who We Are</h3>
						<p>we are leaders in revolutionizing waste management through innovative solutions and cutting-edge technology. With a passion for sustainability and environmental responsibility, we are committed to providing safe, reliable, and efficient waste collection services powered by IoT technology. </p>
						<div class="row">
							<div class="col-lg-6">
								<ul class="list">
									<li><i class="fa fa-eercast"></i>IoT-Enabled Waste Collection</li>
									<li><i class="fa fa-eercast"></i>Route Optimization</li>
									<li><i class="fa fa-eercast"></i>Recycling Programs</li>
								</ul>
							</div>
							<div class="col-lg-6">
								<ul class="list">
									<li><i class="fa fa-eercast"></i>Waste Audits and Consulting</li>
									<li><i class="fa fa-eercast"></i>Environmental Monitoring</li>
									<li><i class="fa fa-eercast"></i>Public Awareness Campaigns</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- End Choose Left -->
				</div>
				<div class="col-lg-6 col-12">
					<div class="img-right">
						<img src="img/video-bg1.png" alt="#">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Why choose -->

	<!-- Start Feautes -->
	<section class="Feautes section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>We Are Always Ready to Help You </h2>
						<p>we are dedicated to providing exceptional service and support to our clients. Our team of experienced professionals is committed to helping you address your waste management challenges and achieve your sustainability goals.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-12">
					<!-- Start Single features -->
					<div class="single-features">
						<div class="signle-icon">
							<i class="fa fa-map-marker"></i>
						</div>
						<h3>Get Location</h3>
						<p>The first step in our recycling process involves retrieving the location of garbage bins using GPS technology.
							By accurately pinpointing the location of bins, our system optimizes collection routes, ensuring efficient and timely pickups.</p>
					</div>
					<!-- End Single features -->
				</div>
				<div class="col-lg-4 col-12">
					<!-- Start Single features -->
					<div class="single-features">
						<div class="signle-icon">
							<i class="icofont-articulated-truck"></i>
						</div>
						<h3>Collection</h3>
						<p>Once the locations are obtained, our waste management teams proceed with the collection of garbage from designated bins.
							Equipped with real-time data on fill levels,our drivers follow optimized routes to maximize efficiency and minimize environmental impact.</p>
					</div>
					<!-- End Single features -->
				</div>
				<div class="col-lg-4 col-12">
					<!-- Start Single features -->
					<div class="single-features last">
						<div class="signle-icon">
							<i class="icofont-recycle"></i>
						</div>
						<h3>Recycle</h3>
						<p>After collection, the gathered waste undergoes recycling to transform recyclable materials into valuable resources.
							Our recycling facilities utilize advanced techniques to process materials such as plastics, glass, paper, and metals,
							contributing to a circular economy and reducing reliance on virgin resources.</p>
					</div>
					<!-- End Single features -->
				</div>
			</div>
		</div>
	</section>
	<!--/ End Feautes -->



	<!-- Start service -->
	<section class="services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>We Offer Different Services</h2>
						<p>we understand the importance of efficient waste management in maintaining cleanliness, promoting sustainability, and enhancing overall quality of life. That's why we offer a range of services designed to streamline waste management processes and optimize resource utilization.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont-safety"></i>
						<h4><a href="#">Safety-first Approach</a></h4>
						<p>Our IoT-enabled garbage bins are equipped with sensors that monitor fill levels, reducing the risk of overflowing bins and associated hazards.</p>

					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont icofont-prescription"></i>
						<h4><a href="#">Reliable Pickup Schedules</a></h4>
						<p>With real-time data and route optimization, our system ensures timely collection, minimizing disruptions and maintaining cleanliness in your area.</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="fa fa-leaf" aria-hidden="true"></i>
						<h4><a href="#">Environmental Responsibility</a></h4>
						<p>By optimizing collection routes, we reduce fuel consumption and emissions, contributing to a cleaner and healthier environment.</p>

					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont-ssl-security"></i>
						<h4><a href="#">Secure Data Management</a></h4>
						<p>We prioritize the security of your data, ensuring that sensitive information such as pickup locations is handled with the utmost care.</p>

					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont-notification"></i>
						<h4><a href="#">Smart Maintenance Alerts</a></h4>
						<p>Our system is equipped with predictive maintenance capabilities that automatically detect and alert maintenance teams about potential issues with garbage bins or collection vehicles.</p>

					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="icofont icofont-user"></i>
						<h4><a href="#">User-Friendly Analytics Dashboard</a></h4>
						<p>Gain valuable insights into your waste management operations with our user-friendly analytics dashboard. </p>


					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!--/ End service -->




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