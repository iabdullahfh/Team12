<?php
include 'includes/db.inc.php';
session_start();

$user = $_SESSION['UserID'];
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysqli_real_escape_string($conn, $id);
$ip_sql=mysqli_query($conn, "SELECT VoteID from votes WHERE FeedbackId ='$id' and UserID='5'");
    $count=mysqli_num_rows($ip_sql);
    
    if($count==0)
    
  {  
if($_POST['type']=='like'){
$sql = "UPDATE feedback SET upVote = upVote+1 WHERE FeedbackID='$id'";
mysqli_query($conn,$sql);
    
    $sql_vote="INSERT INTO votes (FeedbackId, UserID) values ('$id', '$user')"; // THIS NEEDS TO BE CHANGED TO USERID
    mysqli_query($conn,$sql_vote);
    




   
 

    

} else if($_POST['type']=='dislike')
{
    $sql2 = "UPDATE feedback SET upVote = upVote-1 WHERE FeedbackID='$id'";
mysqli_query($conn,$sql2);
    $sql_vote2="INSERT INTO votes (FeedbackId, UserID) values ('$id', 5)";
    mysqli_query($conn,$sql_vote2);
    



    
 
}

    
    }
}
else
{
   
}
$result=mysqli_query($conn, "SELECT upVote  from feedback where FeedbackID='$id'");
$row=mysqli_fetch_array($result);
 $vote = $row['upVote'];
  echo $vote;


?>