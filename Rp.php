<?php require 'header.php';?>
<?php require 'Rp.html';
if (!($_SESSION['Type']==1))
{

    header('Location: index.php');
}
?>