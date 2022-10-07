<?php 
include("include/connection.php");

?>
<!Doctype html>
<html>
<head>
<link href="bootstrap/css/bootstrap.min.css" 
     rel="stylesheet">
<link type="text/css" href="css/sign_in.css" rel="stylesheet">
<style>
body{
	background:linear-gradient(
	to left,red 60%,#ff99cc 100%
	);
}
</style>
</head>
<body style="background-color:black;">
<div class="signin_form">
<div class="sign">
<li><a class="signin" style="color:white;text-decoration: underline;" href="#">Sign in</a></li>
<li><a class="signout" style="color:white;padding-right:15px;" href="sign_up.php">Sign up</a></li>
</div><br><br>
<p class="pp"></p>
<div>

<form method="POST" action="">
<div class="forminput">
      <input style="border-bottom-width:1px;width:70%;border-radius:0 35px 0 0;" type="email" class="form-control" 
       placeholder="Email" name="email"
	   autocomplete="off" required>
	  
	 <input style="width:70%;border-bottom-width:1px;border-radius:3px;border-radius:0 0 35px 0;" 
	type="password" class="form-control" placeholder="Password" name="pass" 
	 autocomplete="off" required>
	 
  </div>
	<br>
	<button style="font-family:Fantasy;font-weight:bold;font-size:10px;" type ="submit" class= "signin btn  btn-warning   
	  btn-block " name="sign_in">SIGN IN </button>
	  
	  
	<?php include("signin_user.php"); ?> 
<div class="text-center small" style="color:#674288;padding-bottom:0px;">

</form>

<a class="signout" style="color:orange;padding-right:15px;
" href="sign_up.php">
<button class="btn btn-warning" style="padding:5px;margin:0px;border-radius:15px;">
Create
</button>
</a>

<br><br>
<div class="small" ><a style="padding-left:25px;padding-bottom:20px;color:teal;" href="forgot_pass.php">Forgot password?</a></div><br>
<br>
</div>
</div>
</body>
</html>
