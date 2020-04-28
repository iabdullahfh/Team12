<?php require 'header.php';?>
  <!doctype html>
<html lang="en">
  <head>

    <title>Feedback Index</title>
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
                <h1>Products table</h1>
                <p>this is list of products, choose one to post reviwes or ideas..</p>
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
                <th>Name</th>
                <th>Price</th>
                <th>Type</th>
                <th>Visit</th>
            </tr>
            </thead>
            <tbody>

            <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {

                    echo '<tr class="text-center">
                    <td>'.$row['ProductID'].'</td>
                    <td>'.$row['ProductName'].'</td>
                    <td>'.$row['Price'].'</td>
                    <td>'.$row['Type'].'</td>
                    <td><a href="feedback.php?id=' . $row['ProductID'] . '"><button class="btn" type="button">Click Here</button></a>
                    </td>
                    </tr>';

                }   
            ?>
            
            </tbody>
            </table>
            </div>
        </div>
    </div>
 </div> 

</main>

</body>
</html>
