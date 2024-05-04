<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

include_once 'product-action.php';

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Items</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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

                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="branches.php">Choose Nearst Branch</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="items.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your waste item</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Conform Address and Pay</a></li>

                </ul>
            </div>
        </div>
        <?php $ress = mysqli_query($db, "select * from branch where rs_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);

        ?>
        <section class="inner-page-hero bg-image" data-image-src="admin/Res_img/<?php echo $rows['image']; ?>">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><?php echo '<img src="admin/Res_img/' . $rows['image'] . '" alt="Branch logo">'; ?></figure>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                <p><?php echo $rows['address']; ?></p>
                                <h1 style="color: white; font-size: 50px; font-weight: bold; animation: fadeInUp;">Bin It, Bag It, Cart It</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="breadcrumb">
            <div class="container">

            </div>
        </div>
        <br>
        <h4 style="text-align: center;">Collect your waste, schedule a pick-up, and pay All in one place. It's waste removal made simple!</h4>
        <br><br>

        <div class="col-md-12 highlighted-section">
            <div class="menu-widget" id="2">
                <?php
                $stmt = $db->prepare("select * from items where rs_id='$_GET[res_id]' and title='Unknown'");
                $stmt->execute();
                $products = $stmt->get_result();
                if (!empty($products)) {
                    foreach ($products as $product) {
                ?>
                        <div class="menu-item">
                            <div class="item-item">
                                <div class="row">
                                    <div class="col-lg-8 ">
                                        <form method="post" action='items.php?res_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="branch-logo pull-left" href="#">
                                                    <img src="admin/Res_img/items/<?php echo $product['img']; ?>" alt="Item logo">
                                                </a>
                                            </div>
                                            <div class="rest-descr">
                                                <br>
                                                <h6 style="color: black;">Organize your waste, schedule a pick-up, and pay All in one place. It's waste removal made simple!</h6>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-4 item-cart-info">
                                        <form method="post" action='items.php?res_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <!-- Remove the quantity input box and set the quantity to 1 -->
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="submit" class="btn theme-btn" value="Bin Pick up" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>




        <div class="container m-t-30">
            <br>
            <div class="row">
                
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                <br>
                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Your Bin
                            </h3>


                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">


                                <?php

                                $item_total = 0;

                                foreach ($_SESSION["cart_item"] as $item) {
                                ?>

                                    <div class="title-row">
                                        <?php echo $item["title"]; ?><a href="items.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
                                            <i class="fa fa-trash pull-right"></i></a>
                                    </div>

                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "LKR" . $item["price"]; ?> readonly id="exampleSelect1">

                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>

                                    </div>

                                <?php
                                    $item_total += ($item["price"] * $item["quantity"]);
                                }
                                ?>



                            </div>
                        </div>



                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>TOTAL</p>
                                <h3 class="value"><strong><?php echo "LKR" . $item_total; ?></strong></h3>
                                <p>Free Pickup Your Bin!</p>
                                <br>
                                <?php
                                if ($item_total == 0) {
                                ?>


                                    <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check" class="btn btn-danger btn-lg disabled">Bin Payout</a>

                                <?php
                                } else {
                                ?>
                                    <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check" class="btn btn-success btn-lg active">Bin Payout</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>




                    </div>
                </div>



                <div class="col-md-8">
<h6 style= "text-align: center;">Bin it Smart Save it Big</h6>';
                    <div class="menu-widget" id="2">
                        <?php
                        $stmt = $db->prepare("select * from items where rs_id='$_GET[res_id]'");
                        $stmt->execute();
                        $products = $stmt->get_result();
                        if (!empty($products)) {
                            foreach ($products as $product) {
                                if ($product['title'] != "Unknown") { // Skip Main Menu and show only Sub Menu
                                    echo '<div class="widget-heading">';
                                   
                                    echo '</div>';
                                    echo '<div class="row sub-menu">'; // Added sub-menu class for styling
                        ?>
                                    <!-- Sub menu items -->
                                    <div id="popular2" class="menu-items">
                                        <div class="item-item">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-lg-8">
                                                    <form method="post" action='items.php?res_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                        <div class="rest-logo pull-left">
                                                            <a class="branch-logo pull-left" href="#">
                                                                <img src="admin/Res_img/items/<?php echo $product['img']; ?>" alt="Item logo">
                                                            </a>
                                                        </div>
                                                        <div class="rest-descr">
                                                            <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                            <p class="item-description"><?php echo $product['slogan']; ?></p> <!-- Change text color to black -->
                                                            <span class="price pull-left">Per 1Kg : LKR.<?php echo $product['price']; ?></span>

                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info">
                                                    <br>
                                                    <form method="post" action='items.php?res_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                        <input class="b-r-0" type="text" name="quantity" style="margin-left:30px;" value="1" size="2" />

                                                        <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add To Bin" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                    echo '</div>'; // Close the sub-menu row
                                }
                            }
                        }
                        ?>
                    </div>
                </div>


            </div>

        </div>

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


    <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                <div class="modal-body cart-addon">
                    <div class="item-item white">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="branch-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Item logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect2">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-2">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="item-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="branch-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Item logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.49</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect3">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="item-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="branch-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Item logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 1.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect5">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-4">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="item-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="branch-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Item logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 3.15</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect6">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-5">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn theme-btn">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/map.js"></script>
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