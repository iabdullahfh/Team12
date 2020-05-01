<?php
include 'includes/db.inc.php';
$ip=$_SERVER['REMOTE_ADDR'];

//if($_POST['id'])
//{
$id=$_POST['id'];





if($_POST['type']=='publish'){

$sql = "UPDATE feedback SET Status=1 WHERE FeedbackID='$id'";
mysqli_query($conn,$sql);
    


$result=mysqli_query($conn, "SELECT Status from feedback WHERE FeedbackID='$id'");
$row=mysqli_fetch_array($result);
    
  $stat = $row['Status'];
  
echo "Published!";

} else if($_POST['type']=='delete'){

$sqlDelete = "UPDATE feedback SET Status=2 WHERE FeedbackID='$id'";
mysqli_query($conn,$sqlDelete);
    


$resultDelete=mysqli_query($conn, "SELECT Status from feedback WHERE FeedbackID='$id'");
$row=mysqli_fetch_array($resultDelete);
    
  $stat = $row['Status'];
  
echo "Deleted!";


}else if ($_POST['type']=='respond'){

$sqlResponse = "UPDATE feedback SET Response ='$response' WHERE FeedbackID='$id'";
mysqli_query($conn,$sqlResponse);
    


$resultResponse=mysqli_query($conn, "SELECT Status from feedback WHERE FeedbackID='$id'");
$row=mysqli_fetch_array($resultResponse);
    
  
  
echo "Response submitted!";
}


?>