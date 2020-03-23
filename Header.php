<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Header</title>
  <link rel="stylesheet" href="/css/header.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>


  <script type="text/javascript">

  $(function(){
    $('a#logout').click(function(){

        alert("You have logged out!");

        return true;
    });
});


  </script>


  <div class="topnav">
    <img src= "images/logo_sage.png" alt="Sage">
    <a class="active" href="#home">Home</a>
    <a class="active" href="#about">About</a>
    <a class="active" href="#contact">Contact</a>

    <?php

    if (!isset($_SESSION['UserID'])) {

      echo '<div class="signup-container">
      <form action="/signup.php">

      <button type="submit">Signup</button>

      </form>
      </div>';
      echo '<div class="login-container">
      <form action="/includes/login.inc.php" name="login" method="post">
      <input type="text" placeholder="Username" name="username">
      <input type="password" placeholder="Password" name="pwd">
      <button type="submit" name="login-submit">Login</button>

      </form>

      </div>';
    }
    else {

      echo '<div class="logout-container">
      <form action="/includes/logout.inc.php">
      <img src="images/person.png" class="account" alt="my account" height="60" width="60">


      </form>
      <div class="dropdown-content">
      <a href="#">Personal information</a>
      <a href="#">My posts</a>
      <a href="/includes/logout.inc.php" id="logout">Logout</a>
      </div></div>';
    }
    ?>

  </div>

</body>
</html>
