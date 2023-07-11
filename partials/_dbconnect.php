<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database= "login-system"; 
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

// Set the timezone to Indian Standard Time (IST)
date_default_timezone_set('Asia/Kolkata');
// Get the current time in IST
$current_time = date('Y-m-d H:i:s');
?>