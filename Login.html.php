<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Login-Unplanned Pregnancy</title>
  	<!--Bootstrap CDN (Content Delivery Network)-->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<!--Link for JQuery and JavaScript stuff-->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  	<link href="style.css" rel="stylesheet">

    <style type="text/css">
      body{
        background-image: url(img/pexels-photo-567973.jpeg);
        background-size: cover;
      }

      .btn {
        //Move to center???
      }
    </style>
  </head>

  <body>
    <div class="box">
      <img src="img/user.png" class="loginAvatar">
      <h2>Login</h2>
      <form>
        <div class="inputBox">
          <p>Username</p>
          <input type="text" name="username" placeholder="Enter Username" required="">
        </div>

        <div class="inputBox">
          <p>Password</p>
          <input type="password" name="password" placeholder="Enter Password" required="">
        </div>
        <a href="HomePageLoggedIn.html">
          <button type="submit" class="btn btn-primary btn-lg">Login</button>
        </a>
        <a href="index.html">
          <button type="button" class="btn btn-outline-light btn-lg">Cancel</button>
        </a>
        <br>
        <a href="#">Forgot password?</a>
      </form>
    </div>
  </body>
</html>

<?php

  //check if login button was clicked (not bypassing login page)
  if(isset($_POST['submit'])){
    include 'dbh.inc.php';  //connection to db

    $username = mysqli_real_escape_string($conn, $_POST['$username']);
    $password = mysqli_real_escape_string($conn, $_POST['$password']);

    //error handlers

    //check if input is empty
    if(empty($username) || empty($password)){
      header("Location: ../index.html?login=empty");
      exit();
    }
    else {
      //check if username exists
      $sql = /*CRAIG THIS IS THE STORED PROCEDURE TO CHECK IF USERNAME EXISTS AND RETURNS NUMBER OF ROWS
              Should look similar to this:
              SELECT * FROM user WHERE user_id="$username"; */

      $result = mysqli_query($conn, $sql);
      $resultCheck = mysql_num_row($result);

      if($resultCheck < 1) {  //no rows = no match...username does not exist
        header("Location: ../index.html?login=error");
        exit();
      }
      else {  //correct pasword//
        if($row = mysqli_fetch_assoc($result)){
          //De-hashing password
          $hashedPassword = password_verify($pasword, $row['password']);

          //check if true or false result
          if($hashedPassword == false) {
            header("Location: ../index.html?login=error");
            exit();
          }
          elseif($hashedPassword == true) {
            //Login user and storing info into session variables for use throughout the website
            $_SESSION['username'] = $row['']; //CRAIG SPECIFY THE ROW NAME IN THE TABLE TO OBTAIN THIS INFO
            $_SESSION['password'] = $row[''];
            $_SESSION['email'] = $row[''];
            $_SESSION['first_name'] = $row[''];
            $_SESSION['last_name'] = $row[''];
            $_SESSION['gender'] = $row[''];

            //forward user to logged in home page
            header("Location: ../HomePageLoggedIn.html?login=success");
            exit();
          }
        }
      }
    }
  }
  else {
    header("Location: ../index.html?login=error");
    exit();
  }
?>
