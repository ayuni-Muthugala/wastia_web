<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert()
{


    echo "<script>alert('Thank you. Your Order has been placed!');</script>";
    echo "<script>window.location.replace('your_orders.php');</script>";
}

if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {


    foreach ($_SESSION["cart_item"] as $item) {

        $item_total += ($item["price"] * $item["quantity"]);

        if ($_POST['submit']) {

            $SQL = "insert into users_orders(u_id,title,quantity,price) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "')";

            mysqli_query($db, $SQL);


            unset($_SESSION["cart_item"]);
            unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]);
            $success = "Thank you. Your order has been placed!";

            function_alert();
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
        <title>Checkout</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
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
            <div class="top-links">
                <div class="container">
                    <ul class="row links">

                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="branchs.php">Choose Branch</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your item</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Order and Pay</a></li>
                    </ul>
                </div>
            </div>

            <div class="container">

                <span style="color:green;">
                    <?php echo $success; ?>
                </span>

            </div>




            <div class="container m-t-30">
                <form action="" method="post">
                    <div class="widget clearfix">

                        <div class="widget-body">
                            <form method="post" action="#">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="cart-totals margin-b-20">
                                            <div class="cart-totals-title">
                                                <h4>Cart Summary</h4>
                                            </div>
                                            <div class="cart-totals-fields">
                                            <table class="table">
    <tbody>
        <tr>
            <td>Bin Eran Subtotal</td>
            <td><?php echo "LKR." . $item_total; ?></td>
        </tr>
        <tr>
            <td>Pickup Charges</td>
            <td>Free</td>
        </tr>

        <tr>
            <td class="text-color"><strong>Total</strong></td>
            <td class="text-color"><strong><?php echo "LKR." . $item_total; ?></strong></td>
        </tr>
        <tr>
            <td>Delivery Location:</td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="location_fields">
                <div id="current_location_field">
                        <label>
                        <input type="radio" name="delivery_option" value="account_address" checked onclick="toggleLocationFields()"> Get Account Address
                        </label>
                    </div>
                    <div id="manual_address_field">
                        <label>
                            <input type="radio" name="delivery_option" value="manual"  onclick="toggleLocationFields()"> Manual Enter Address
                        </label>
                        <br>
                        <textarea class="form-control" id="manual_location" name="address" rows="3" style="display:none;"></textarea>
                    </div>
                    <div id="current_location_field">
                        <label>
                            <input type="radio" name="delivery_option" value="current_location" onclick="toggleLocationFields(); showGetCurrentLocationButton()"> Get Current Location
                        </label>
                        <br>
                        <button id="current_location_button" style="display:none;" onclick="getLocation()" class="btn btn-info">Get Current Location</button>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<script>
    function showGetCurrentLocationButton() {
        var button = document.getElementById("current_location_button");
        if (button) {
            button.style.display = "block";
        }
    }

    function toggleLocationFields() {
        var manualLocation = document.getElementById("manual_location");
        if (manualLocation) {
            manualLocation.style.display = document.querySelector('input[name="delivery_option"][value="manual"]:checked') ? "block" : "none";
        }

        var button = document.getElementById("current_location_button");
        if (button) {
            button.style.display = document.querySelector('input[name="delivery_option"][value="current_location"]:checked') ? "block" : "none";
        }
    }

    function getLocation() {
        // Your code to get the current location goes here
    }
</script>

                                            </div>

                                            <script>
                                                function toggleLocationFields() {
                                                    var manualLocationField = document.getElementById("manual_location");
                                                    var currentLocationButton = document.getElementById("current_location_button");

                                                    if (document.querySelector('input[name="delivery_option"]:checked').value === "manual") {
                                                        manualLocationField.style.display = "inline-block";
                                                        currentLocationButton.style.display = "none";
                                                    } else {
                                                        manualLocationField.style.display = "none";
                                                        currentLocationButton.style.display = "inline-block";
                                                    }
                                                }

                                                function getLocation() {
                                                    if (navigator.geolocation) {
                                                        navigator.geolocation.getCurrentPosition(showPosition, showError);
                                                    } else {
                                                        alert("Geolocation is not supported by this browser.");
                                                    }
                                                }

                                                function showPosition(position) {
                                                    var lat = position.coords.latitude;
                                                    var lon = position.coords.longitude;
                                                    document.getElementById("exampleTextarea").innerHTML = "Latitude: " + lat + "\nLongitude: " + lon;
                                                    // Here you would typically send lat and lon to a server-side geocoding API to get the address
                                                }

                                                function showError(error) {
                                                    switch (error.code) {
                                                        case error.PERMISSION_DENIED:
                                                            alert("User denied the request for Geolocation.");
                                                            break;
                                                        case error.POSITION_UNAVAILABLE:
                                                            alert("Location information is unavailable.");
                                                            break;
                                                        case error.TIMEOUT:
                                                            alert("The request to get user location timed out.");
                                                            break;
                                                        case error.UNKNOWN_ERROR:
                                                            alert("An unknown error occurred.");
                                                            break;
                                                    }
                                                }
                                            </script>

                                        </div>
                                        <div class="payment-option">

                                            <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit" class="btn btn-success btn-block" value="Order Now"> </p>
                                        </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
        </form>
        </div>

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