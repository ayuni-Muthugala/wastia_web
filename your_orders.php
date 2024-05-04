<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id'])) {
	header('location:login.php');
} else {
?>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="#">
		<title>My Orders</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/animsition.min.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<style type="text/css" rel="stylesheet">
			.indent-small {
				margin-left: 5px;
			}

			.form-group.internal {
				margin-bottom: 0;
			}

			.dialog-panel {
				margin: 10px;
			}

			.datepicker-dropdown {
				z-index: 200 !important;
			}

			.panel-body {
				background: #e5e5e5;
				/* Old browsers */
				background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
				/* FF3.6+ */
				background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
				/* Chrome,Safari4+ */
				background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
				/* Chrome10+,Safari5.1+ */
				background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
				/* Opera 12+ */
				background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
				/* IE10+ */
				background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
				/* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
				font: 600 15px "Open Sans", Arial, sans-serif;
			}

			label.control-label {
				font-weight: 600;
				color: #777;
			}

			/* 
table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
			/* tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #404040; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	} */
			*/ @media only screen and (max-width: 760px),
			(min-device-width: 768px) and (max-device-width: 1024px) {

				/* table { 
	  	width: 100%; 
	}

	
	table, thead, tbody, th, td, tr { 
		display: block; 
	} */


				/* thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; } */

				/* td { 
		
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		
		position: absolute;
	
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	} */

			}
		</style>
 <!-- Title -->
 <title>Garbage Collector</title>

<!-- Favicon -->
<link rel="icon" href="img/favicon.png">

<!-- Google Fonts -->

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

		<div class="page-wrapper">



			<div class="inner-page-hero bg-image" data-image-src="images/img/pimg.jpg">
				<div class="container"> </div>

			</div>
			<div class="result-show">
				<div class="container">
					<div class="row">


					</div>
				</div>
			</div>

			<section class="branchs-page">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
						</div>
						<div class="col-xs-12">
							<div class="bg-gray">
								<div class="row">

									<table class="table table-bordered table-hover">
										<thead style="background: #404040; color:white;">
											<tr>

												<th>Item</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>Status</th>
												<th>Date</th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>


											<?php

											$query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "'");
											if (!mysqli_num_rows($query_res) > 0) {
												echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
											} else {

												while ($row = mysqli_fetch_array($query_res)) {

											?>
													<tr>
														<td data-column="Item"> <?php echo $row['title']; ?></td>
														<td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
														<td data-column="price">LKR.<?php echo $row['price']; ?></td>
														<td data-column="status">
															<?php
															$status = $row['status'];
															if ($status == "" or $status == "NULL") {
															?>
																<button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</button>
															<?php
															}
															if ($status == "in process") { ?>
																<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!</button>
															<?php
															}
															if ($status == "closed") {
															?>
																<button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Pickup</button>
															<?php
															}
															?>
															<?php
															if ($status == "rejected") {
															?>
																<button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
															<?php
															}
															?>






														</td>
														<td data-column="Date"> <?php echo $row['date']; ?></td>
														<td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
														</td>

													</tr>


											<?php }
											} ?>




										</tbody>
									</table>



								</div>

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

		</div>


		<script src="js/jquery.min.js"></script>
		<script src="js/tether.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/animsition.min.js"></script>
		<script src="js/bootstrap-slider.min.js"></script>
		<script src="js/jquery.isotope.min.js"></script>
		<script src="js/headroom.js"></script>
		<script src="js/itempicky.min.js"></script>
	</body>

</html>
<?php
}
?>