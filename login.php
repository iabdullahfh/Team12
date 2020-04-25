<?php require 'header.php';?>
  <!doctype html>
<html lang="en">
  <head>

    <title>Feedback Index</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/login.css">
  </head>
    
    
  
 <main>

 <!-- this container is from https://bootsnipp.com/snippets/a6Pdk -->
    <div class="container">
        <div class="card card-container">
            
            <img id="profile-img" class="profile-img-card" src="images/avatar.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="includes/login.inc.php" name="login" method="post">
                
                <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
                <input type="password" class="form-control" placeholder="Password" name="pwd" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login-submit">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
 </main>

</html>