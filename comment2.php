<?php
session_start();
?>
<?php
include("include/connection.php");
$idC=$_POST['id'];
$_SESSION['idcomment']=$idC;
?>