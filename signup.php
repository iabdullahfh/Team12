<?php require 'header.php';?>
  <!doctype html>
<html lang="en">
  <head>

    <title>Feedback Index</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/signup.css">
  </head>
    
 <main>

  <!-- this container is from https://bootsnipp.com/snippets/a6Pdk -->
  <div class="container">
        <div class="card card-container">
            
            <img id="profile-img" class="profile-img-card" src="images/avatar.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="includes/signup.inc.php" name="signup" method="post">
                
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $_GET["uid"]; ?>" required autofocus>
                <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $_GET["email"]; ?>" required>
                <input type="text" class="form-control" placeholder="First Name" name="firstName" required>
                <input type="text" class="form-control" placeholder="Last Name" name="lastName" required>
                <input type="password" class="form-control" placeholder="Password" name="pwd" required>
                <input type="password" class="form-control" placeholder="Repeat Password" name="pwd-repeat" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="signup-submit">Sign up</button>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
  </div><!-- /container -->

 </main>

</html>