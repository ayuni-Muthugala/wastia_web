<?php

//main connection file for both admin & front end
$servername = "localhost"; //server
$username = "root"; //username
$password = ""; //password
$dbname = "waste_management";  //database
$port = "3399"; //port

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname, $port); // connecting 
// Check connection
if (!$db) {       //checking connection to DB	
    die("Connection failed: " . mysqli_connect_error());
}

?>