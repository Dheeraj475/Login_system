<?php 
include "partials/_dbconnect.php";

session_start();
$wronguser = false;

// Check if login was details were wrong and display alert
if (isset($_SESSION['notsignup'])){
  $wronguser = "You are not signup, signup now!";
  
// Remove the session variable after displaying the alert
  unset($_SESSION['notsignup']);
}

// Post method success boolean
// $insert = false;
$showError = false; 

// Post method runs
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST["username"];
$password = $_POST["password"];
$conpassword = $_POST["confirmpassword"];

// Check whether this email exists or not
$existSql = "SELECT * FROM `users` WHERE username = '$username'"; // It fetches 
$result = mysqli_query($conn, $existSql);
$numExistRows = mysqli_num_rows($result); // It gives match in rows
if($numExistRows > 0){ // Username have already then exist if not signup
    $showError = "Username Already Exists";
    $_SESSION['userhave'] = true;
    header("location: 2_Login.php");
}

// Checking the password 
else if($password == $conpassword){

// Inserting the data
$hash = password_hash($password, PASSWORD_DEFAULT); // Hashing the password
$sql = "INSERT INTO `users` (`sno`, `username`, `password`, `date`) VALUES (NULL, '$username', '$hash', '$current_time')";
$result = mysqli_query($conn, $sql);
if ($result){
    // $insert = true; // For alert
    $_SESSION['signup_success'] = true; // Session to show the signup alert
    header("location: 2_Login.php"); // Handle in login alert
    exit;

}
}else {
    $showError = "Password do not matched";
}
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

    <title>Signup</title>

<style>
  .container{
    width:40%;
  }

  @media (max-width:900px){
    .container{
    width:50%;
  }}
  @media (max-width:700px){
    .container{
    width:60%;
  }}
  @media (max-width:600px){
    .container{
    width:75%;
  }}
  @media (max-width:500px){
    .container{
    width:100%;
  }}
  @media (max-width:400px){
    .container{
    width:100%;
  }}
  @media (max-width:300px){
    .container{
    width:100%;
  }
  }
</style>

</head>
<body>
    <?php require "partials/_nav.php"?>

    <?php
    // if ($insert){
    // echo ' <div class="alert alert-success alert-dismissible fade show center" role="alert" style="width:40%; position:relative; left:30%" >
    // <strong>Success!</strong> Your account is created and you can login now.
    // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    // <span aria-hidden="true">&times;</span>
    // </button>
    // </div>';
    // }
    if ($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show center" role="alert" style="width:40%; position:relative; left:30%" >
    <strong>Error!</strong> '.$showError.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    if ($wronguser){
    echo ' <div class="alert alert-danger alert-dismissible fade show center" role="alert" style="width:40%; position:relative; left:30%" >
    <strong>Error!</strong> '.$wronguser.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    ?>
    <div class="container my-4">
    <h1 class="text-center">Signup Here:</h1>
  
<form class="mx-5" action="/sitephp/34_Login_System/index.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" maxlength="30" class="form-control" id="username" name="username" placeholder="Enter username" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" maxlength="40" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="confirmpassword">Confirm password</label>
    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Password" required>
    <small id="emailHelp" class="form-text text-muted">Make sure type the same password.</small>
  </div>
  <input type="submit" class="btn btn-info" value="Signup"></input>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>