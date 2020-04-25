<?php require 'header.php';?>
<!doctype html>
<html lang="en">
  <head>

    <title>Feedback Index</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/posts.css">
  </head>
    
    
<body>
<main>

<?php

// send back to index if product isn't passed
if ($_GET['ProductID'] == '') {
    $URL = "index.php";
    if( headers_sent() ) { echo("<script>location.href='$URL'</script>"); }
    else { header("Location: $URL"); }
    exit;
}
?>
  
    
 

<div class="container">
    <div class="row justify-content-center">

        <ul class="nav">
        <li><a href="<?php echo 'posts.php?ProductID='.$_GET['ProductID'].'&Posts=feedback'; ?>">Feedback</a></li>
        <li><a href="<?php echo 'posts.php?ProductID='.$_GET['ProductID'].'&Posts=Ideas'; ?>">Ideas</a></li>
        <li><a href="<?php echo 'posts.php?ProductID='.$_GET['ProductID'].'&Posts=request'; ?>">Future Request</a></li>
        </ul>

    </div><!-- end menu bar-->
</div>

<?php

    $sql = "SELECT * FROM feedback WHERE ProductID = ".$_GET['ProductID']." AND Category = '".$_GET['Posts']."'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

    echo '<div class="container posts">
        <div class="row justify-content-center">
            <div class="col-sm-10">
    
                <p class="user">'.$row['UserID'].'</p>
                <div class="card">
                    <div class="card-header">
                        <p>'.$row['Category'].'</p>
                    </div>
                    <div class="card-body">
                        <div class=row>
                            <div class="col-sm-9 col-md-10">
                                <p>'.$row['Comment'].'</p>
                            </div>
                            <div class="col-sm-3 col-md-2 text-right">
                                
                            <i class="fas fa-chevron-up"></i>
                            <p>votes</p>
                            <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <p class=text-left>Date: '.$row['Date'].' Time: '.$row['Time'].'</p>
                    </div>
                </div>
    
            </div>
        </div>
    </div>';    

    }   

?>

</main>


</body>
</html>