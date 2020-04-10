<?php require 'header.php';?>
  <!doctype html>
<html lang="en">
  <head>

    <title>My Account</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/account.css">
  </head>
    
    
<body>

<main>

<div class="container">
    <div class="row">

      <!-- Side bar -->
      <div class="col-sm-12 col-md-3">

          <ul class="list-group">
            <li class="list-group-item active">Account</li>
            <li class="list-group-item"><a class="nav-item" href="index.php">My details</a></li>
            <li class="list-group-item"><a class="nav-item" href="index.php">Change password</a></li>
            <li class="list-group-item"><a class="nav-item" href="index.php">My posts</a></li>
          </ul>
       
          <ul class="list-group">
            <li class="list-group-item active">Administration</li>
            <li class="list-group-item"><a class="nav-item" href="index.php">Add Product</a></li>
            <li class="list-group-item"><a class="nav-item" href="index.php">Blocked Users</a></li>
            <li class="list-group-item"><a class="nav-item" href="index.php">Deleted Posts</a></li>
            <li class="list-group-item"><a class="nav-item" href="index.php">Reports</a></li>
          </ul>


      </div><!-- End side bar -->

      <!-- content -->
    <div class="col-sm-12 col-md-9">
        
      <div class="container-content">
        
        <?php 
        if ($_GET['account'] == '' || $_GET['account'] == 'details') {

          echo '<div>
          <h1>My Details</h1>
          <form action="includes/update.inc.php" method="post">
          <div class="form-group">
            
            <div class="row">
              <div class="col-xs-12 col-md-4">
              <label for="formGroupExampleInput">Username</label>
              <input type="text" class="form-control" id="formGroupExampleInput" name="Username" value="'.$_SESSION['Username'].'">
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-md-12">
              <label for="formGroupExampleInput">Email</label>
              <input type="text" class="form-control" id="formGroupExampleInput" name="Email" value="'.$_SESSION['Email'].'">
              </div>
            </div>
      
            <div class="row">
              <div class="col-xs-12 col-md-8">
              <button type="submit" class="btn" name="details-btn">Update</button>
              </div>
            </div>
            
          </div>
          </form>
        </div><!-- end my details-->';

        }
        
        else if($_GET['account'] == 'pwd'){
        
          echo '<div>
          <h1>Change Password</h1>
            <form>
              <div class="form-group row">
              <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Current password">
              </div>
              </div>
              <div class="form-group row">
              <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="New password">
              </div>
              </div>
              <div class="form-group row">
              <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Repeat new password">
              </div>
              </div>
              <div class="form-group row">
              <div class="col-sm-10">
              <button type="submit" class="btn">Update</button>
              </div>
              </div>
            </form>
          </div><!-- end change password-->';

        }
        
        elseif ($_GET['account'] == 'post') {
          
          echo '<h1>My Posts</h1>
          <ul class="list-group">
            <li class="list-group-item active"> title</li>
            <li class="list-group-item"><p>post content <br><br><br><br><br>
            </p></li>
            <li class="list-group-item">date: 12/12/1990 time: 12:00</li>
          </ul>';

        }?>

        

      </div>
    </div>
</div>

</main>

</body>
</html>