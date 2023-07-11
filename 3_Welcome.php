<?php
include "partials/_dbconnect.php";
// starting session for welcome page
session_start();

// Check the session if the user logged in redirect to welcome page
// If not or logged out it redirects to the login page when click on welcome page (Logout)
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){ // Set the logout session
header("location: 2_Login.php"); // Session redirects to the login page
exit;
}
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Welcome</title>
</head>
<body>
    <?php require "partials/_nav.php"?>

    <div class="container my-4">
    <div class="alert alert-success" role="alert">
    <h4 class="alert-heading text-center">Welcome - <?php echo $_SESSION['username'];?></h4>
    <p>Hey how are you doing? Welcome to iSecure. You are logged in as <?php echo $_SESSION['username']?>
    <hr>
    <p class="mb-0">Whenever you need to, be sure to logout <a href="/sitephp/34_Login_System/4_Logout.php"> using this link.</a></p>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>