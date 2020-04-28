<?php
require 'includes/db.inc.php';
   
    $title = $_POST['title'];
    $comments = $_POST['comments'];
    $category = $_POST['category'];
    $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
    $filecontents = file_get_contents('webdictionary.txt');

    $words = preg_split('/[\s]+/', $filecontents, -1, PREG_SPLIT_NO_EMPTY);

$comments = str_ireplace($words, '****', $comments );


   
session_start();
          
$user = $_SESSION['UserID'];

$product = $_POST['product'];
    
    $tableName = 'feedback';

    include_once 'includes/db.inc.php'; 

   $sql = "INSERT INTO feedback(Category, Title, Comment, ProductID, UserID)
values ('$category','$title', '$comments', '$product', '$user')";
   
    header('Refresh:2;url=feedback.php');
    if(mysqli_query($conn,$sql)){
    echo 'Thankyou for your feedback!';
        
    }else{
        echo 'failed';
    }

    
    mysqli_close($conn);
fclose($myfile);


?>