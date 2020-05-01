<?php require 'header.php';
if (!($_SESSION['Type']==1))
{

    header('Location: index.php');
}

?>
  <!doctype html>
<html lang="en">
  <head>

    <title>Feedback report</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/index.css">
  </head>
    
    
<body>
<main>

    <div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="heading">
                <h1><center><span font-color="">List of reviews<span></center></h1>
                
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="content-table">
            <table class="table table-striped">
            <thead class="tr-header">
            <tr class="text-center">
                <th>#</th>
                <th>Title</th>
                <th>Comment</th>
                <th>Category</th>
                <th>Date</th>
                <th>upVote</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php
                $sql = "SELECT * FROM feedback";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {

                    echo '<tr class="text-center">
                    <td>'.$row['FeedbackID'].'</td>
                    <td>'.$row['Title'].'</td>
                    <td>'.$row['Comment'].'</td>
                    <td>'.$row['Category'].'</td>
                    <td>'.$row['Date'].'</td>
                    <td>'.$row['upVote'].'</td>
                    <td>'.$row['Status'].'</td>
                    </td>
                    </tr>';

                }   
            ?>
            
            </tbody>
            </table>
            <div><td><a href="Rp.php"><button class="btn" type="button">Categories of reviews</button></a></div>
            <div><td><a href="Rvote.php"><button class="btn" type="button">Voting statistics </button></a></div>
            <div><td><a href="account.php?account=details"><button class="btn" type="button">Back</button></a></div>
            </div>
        </div>
    </div>
 </div> 

</main>

</body>
</html>