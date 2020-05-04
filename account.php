<?php require 'header.php';
if(!isset($_SESSION['UserID']))

    header('Location: index.php');?>
  <!doctype html>
<html lang="en">
  <head>

    <title>My Account</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/accountcss.css">
  </head>
    
    
<body>

<main>

<div class="container">
    <div class="row">

      <!-- Side bar -->
      <div class="col-sm-12 col-md-3">

          <ul class="list-group">
            <li class="list-group-item active">Account</li>
            <li class="list-group-item"><a class="nav-item" href="account.php?account=details">My details</a></li>
            <li class="list-group-item"><a class="nav-item" href="account.php?account=pwd">Change password</a></li>
            <li class="list-group-item"><a class="nav-item" href="account.php?account=post">My posts</a></li>
              
          </ul>
       <?php  if (($_SESSION['Type']==1))
{
          echo '<ul class="list-group">
            <li class="list-group-item active">Administration</li>
            <li class="list-group-item"><a class="nav-item" href=feedbackAdmin.php>All reviews</a></li>
            <li class="list-group-item"><a class="nav-item" href="report.php">Reports</a></li>
            
          </ul>';
}
?>
      </div><!-- End side bar -->

      <!-- content -->
    <div class="col-sm-12 col-md-9">
        
      <div class="container-content">
        
        <?php 
        if ($_GET['account'] == "" || $_GET['account'] == 'details') {

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
          <br>';
          $idSession = $_SESSION['UserID'];
          $content = $conn->query("SELECT * FROM feedback WHERE UserID = '$idSession' ORDER BY Date DESC");

          foreach ($content->fetch_all(MYSQLI_ASSOC) as $value) {
            echo '<div class="commentBox">
              <div class="commentTop">

              <div class="displayCategory">';
              echo $value['Category'];
              echo '</div>

              <div class="displayDate">
              posted on ';
              echo $value['Date'];
              echo '</div>
              </div>';

              echo '<div class="commentBottom">
              <div class="displayTitle">' . $value['Title'] . '</div>';
              $commentSec = $value['Comment'];
              $upVote = $value['upVote'];
              $feedback_id = $value['FeedbackID'];
              $response = $value['Response'];

              echo '<div class="displayComment">';
              echo $commentSec;
              echo '</div>';
              echo '</div>';

              echo '<div class="commentFooter">';

              if ($response == null)
              {
                echo 'total votes:  ';
                echo $upVote;
              }
              else
              {
                  echo "Voting is locked for this post";
              }
              echo '</div>';
              echo '</div>';
              echo '<br>';
            };

        }?>

          <?php
          if($_SESSION['Type']==1){
          if ($_GET['account'] == 'reviews')  {
          
          echo '<h1>All reviews</h1>';
          

        }
          else if ($_GET['account'] == 'report') {
          
          echo '<h1>Report</h1>';

        }}else if($_SESSION['Type']!=1){
              if($_GET['account'] == 'reviews' || ($_GET['account'] == 'report'))
          {
              echo '<ul class="list-group">
            
            <li class="list-group-item"><a class="nav-item" href="account.php?account=details">My details</a></li>
            
              
          </ul>';
          }
          }
          
          
          ?>

        

      </div>
          
    </div>
</div>
    </div>
</main>

</body>
</html>

