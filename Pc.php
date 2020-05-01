<?php require 'header.php';?>
<?php require 'Pc.html';
if (!($_SESSION['Type']==1))
{

    header('Location: index.php');
}
?>