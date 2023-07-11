<?php
include "partials/_dbconnect.php";
// Starting the session and unset the session and finally destroyed the session
// Redirect to the login page
session_start();
session_unset(); // It clears the all usage of sessions
session_destroy(); // Deletes all data associated with this session
header("location: 2_Login.php"); // Session destroy to redirect back to login page
exit;
?>