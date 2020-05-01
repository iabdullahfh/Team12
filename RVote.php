<?php require 'header.php';
if (!($_SESSION['Type']==1))
{

    header('Location: index.php');
}
?>
  <!doctype html>
<html lang="en">
  <head>

    <title>Vote</title>
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
                <h1>Votes</h1>
               
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
                <th>VoteID</th>
                <th>UserID</th>
                <th>FeedbackID</th>
            </tr>
            </thead>
            <tbody>

            <?php
                $sql = "SELECT * FROM votes";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {

                    echo '<tr class="text-center">
                    <td>'.$row['VoteID'].'</td>
                    <td>'.$row['UserID'].'</td>
                    <td>'.$row['FeedbackID'].'</td>
                    </tr>';
                }   
            ?>
            
            </tbody>
            </table>
            <div><td><a href="Vt.php"><button class="btn" type="button">Chart</button></a></div>
            </div>
        </div>
    </div>
 </div> 

</main>

</body>
</html>