<?php
include "partials/_dbconnect.php";

session_start();
$signup = false;
// Check if signup was successful and display alert

// Post method success boolean
$Invalid = false;

if (isset($_SESSION['signup_success'])) {
    $signup = "You are succefully signed up, now login to your account";

    // Remove the session variable after displaying the alert
    unset($_SESSION['signup_success']);
}

if (isset($_SESSION['userhave'])) {
    $Invalid = "Login to your account, you already have an account!";

    // Remove the session variable after displaying the alert
    unset($_SESSION['userhave']);
}


// $login = false; 

// Post method runs
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST["username"];
$password = $_POST["password"];

// Matching the username and password then start the session and redirecting into welcome page
// If not matched the details it shows invalid credentials
// $sql = "Select * from users where username ='$username' and password='$password'"; // It fetches username and password
$sql = "Select * from users where username ='$username'"; // fetches username only 
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result); // It gives match in rows
if ($num == 1){ // If user have signupped and logged into their account
    while($row = mysqli_fetch_assoc($result)){ // Its fetches only password rows
        if (password_verify($password, $row['password'])){  // Passing the verify password throug hashing
            $login = true; // For alert
            $_SESSION['loggedin'] = true; // Session set to loggedin as true
            $_SESSION['username'] = $username; // Session set to username
            header("location: 3_Welcome.php"); // Session to redirect to welcome page
            exit;
        }

else{ // The Hashing verify login showing alert
    $Invalid = "Invalid Credentials";
}
    }
}else{ // The without exist login showin alert
    // $Invalid = "Invalid Credentials";
    $_SESSION['notsignup'] = true;
    header("location: index.php");
    exit;
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

    <title>Login</title>
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
    // if ($login){
    // echo ' <div class="alert alert-success alert-dismissible fade show center" role="alert" style="width:40%; position:relative; left:30%" >
    // <strong>Success!</strong> You are loggedin.
    // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    // <span aria-hidden="true">&times;</span>
    // </button>
    // </div>';
    // }
    if ($Invalid){
    echo ' <div class="alert alert-danger alert-dismissible fade show center" role="alert" style="width:40%; position:relative; left:30%" >
    <strong>Error!</strong> '.$Invalid.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    if ($signup){
      echo ' <div class="alert alert-success alert-dismissible fade show center" role="alert" style="width:fit-content; position:relative; left:30%" >
      <strong>Success!</strong> '.$signup.'.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
      }
    ?>
    <div class="container my-4">
    <h1 class="text-center">Login Here:</h1>
  
<form class="mx-5" action="/sitephp/34_Login_System/2_Login.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-info">Login</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>