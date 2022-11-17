<?php
session_start();
?>
<?php

include("include/connection.php");
$id=$_POST['id'];
$_SESSION['idid']=$id;
$sql="DELETE  FROM  home_post WHERE id = '".$_POST["id"]."'";
$run=mysqli_query($con,$sql);
if($run) {
	echo"Data Deleted";
}
else{
	echo"sorry cant deleted";
}
?>