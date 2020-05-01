<?php require 'header.php';?>
<?php require 'Vt.html';
if (!($_SESSION['Type']==1))
{

    header('Location: index.php');
}
?>