<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Orders</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body class="fix-header fix-sidebar">

    <script type="module">
        import {
            getDatabase,
            ref,
            push,
            onValue,
            remove
        } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-database.js";
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js";

        const firebaseConfig = {
            apiKey: "AIzaSyDTxHTmY6q5NA8hZ9NdjQx3oSkLzO-WUGo",
            authDomain: "wastiya-616c8.firebaseapp.com",
            databaseURL: "https://wastiya-616c8-default-rtdb.firebaseio.com",
            projectId: "wastiya-616c8",
            storageBucket: "wastiya-616c8.appspot.com",
            messagingSenderId: "200543611807",
            appId: "1:200543611807:web:b229a20f3495a573aa2baa"
        };

        const app = initializeApp(firebaseConfig);
        const database = getDatabase(app);
        const devicesRef = ref(database, 'devices/'); // Define devicesRef at the script level

        window.submitDevice = async function() {
            const name = document.getElementById('deviceName').value; // Capture device name
            const id = document.getElementById('deviceId').value;
            const location = document.getElementById('deviceLocation').value;


            if (!name || !id || !location) {
                alert("Please fill in all required fields.");
                return;
            }

            const newDeviceData = {
                name,
                id,
                location
            };


            try {
                const deviceRef = await push(devicesRef, newDeviceData);
                alert("New device added successfully with ID: " + deviceRef.key);
                document.getElementById('addDeviceForm').reset();
            } catch (error) {
                console.error("Error adding new device:", error);
                alert("Failed to add device. Please try again.");
            }
        };

        // Inside your module script
        window.deleteDevice = function(deviceId) {
            const deviceRef = ref(database, 'devices/' + deviceId);
            remove(deviceRef)
                .then(() => {
                    console.log("Device removed successfully.");
                    alert("Device removed successfully.");
                })
                .catch((error) => {
                    console.error("Failed to remove device:", error);
                    alert("Failed to remove device.");
                });
        };


        // Function to render devices
        function renderDevices(devices) {
            const devicesContainer = document.getElementById('deviceCards');
            devicesContainer.innerHTML = '<div class="row"></div>'; // Start with a fresh row
            const row = devicesContainer.querySelector('.row');

            Object.keys(devices).forEach((key) => {
                const device = devices[key];
                const deviceElement = `
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <div class="media-left meida media-middle">
                                                <span><i class="fa fa-th-large f-s-60" aria-hidden="true"></i></span>
                    </div>
                    <h5 class="card-title">Device Name: ${device.name}</h5>
                        <p class="card-text">IOT Device ID: ${device.id}</p>
                        <p class="card-text">Firebase Ref ID: ${key}</p>
                        <p class="card-text">Location: ${device.location}</p>
                        <p class="card-text">Battery: ${device.battery}%</p>
                        <p class="card-text">Garbage Level: ${device.garbage}%</p>
                        <button data-device-id="${key}" class="btn btn-danger delete-btn">Delete</button>
                    </div>
                </div>
            </div>
        `;
                row.innerHTML += deviceElement;
            });
        }

        // Set up event delegation for delete buttons
        document.getElementById('deviceCards').addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-btn')) {
                const deviceId = event.target.getAttribute('data-device-id');
                deleteDevice(deviceId);
            }
        });


        function deleteDevice(deviceId) {
            const deviceRef = ref(database, 'devices/' + deviceId);
            remove(deviceRef)
                .then(() => {
                    console.log("Device removed successfully.");
                    alert("Device removed successfully.");
                })
                .catch((error) => {
                    console.error("Failed to remove device:", error);
                    alert("Failed to remove device.");
                });
        }

        // Listen for real-time updates
        onValue(devicesRef, (snapshot) => {
            const data = snapshot.val();
            renderDevices(data);
        });
    </script>




    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span><img src="images/icn.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">




                    </ul>

                    <ul class="navbar-nav my-lg-0">



                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-chart-line"></i><span>Dashboard</span></a></li>

                        </li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Branch</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_branch.php">All Branch</a></li>
                                <li><a href="add_category.php">Add Category</a></li>
                                <li><a href="add_branch.php">Add Branch</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-th-large" aria-hidden="true"></i><span class="hide-menu">Item</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">All Items</a></li>
                                <li><a href="add_menu.php">Add Item</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                        <li> <a href="live_check.php"><i class="fa fa-spinner" aria-hidden="true"></i><span>Live Check Bins</span></a></li>

                    </ul>
                </nav>

            </div>

        </div>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDeviceModalLabel">Add New Device</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addDeviceForm">
                            <div class="form-group">
                                <label for="deviceName">Device Name</label>
                                <input type="text" class="form-control" id="deviceName" required>
                            </div>
                            <div class="form-group">
                                <label for="deviceType">Device Id</label>
                                <input type="text" class="form-control" id="deviceId" required>
                            </div>
                            <div class="form-group">
                                <label for="deviceLocation">Location</label>
                                <input type="text" class="form-control" id="deviceLocation" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="submitDevice()">Add Device</button>
                    </div>
                </div>
                <div id="deviceCards"></div>

                <!-- IoT Device Cards will be added here dynamically -->
            </div>
        </div>
    </div>

    <script>
        // Function to show the modal form
        function addDevice() {
            $('#addDeviceModal').modal('show'); // Show the add device modal
        }
    </script>


    </div>

    </div>


    <footer class="footer"> © 2024 - Waste Management System</footer>

    </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

</body>

</html>