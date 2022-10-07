
<?php 
 include("include/connection.php");
 
  if(isset($_POST['sign_up'])){
	   
	  $name=htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
	  $pass=htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));
	  $email= htmlentities(mysqli_real_escape_string($con,$_POST['user_email']));
	  $country=htmlentities( mysqli_real_escape_string($con,$_POST['user_country']));
	  $gender=htmlentities( mysqli_real_escape_string($con,$_POST['user_gender']));
	  $last=htmlentities( mysqli_real_escape_string($con,$_POST['last_name']));
	  $rand=rand(1,2);
	  if($name==""){
   echo"<script>alert('we can not verify your name')</script>";
	  }	  
	  if(strlen($pass) < 8 ){
		  echo"<script>alert('password should be miniumum 8 character')</script>";
	  }
	   $check_email = "SELECT * from users WHERE user_email='$email'";//TABLE MUST BE CHECK
	   $run_email= mysqli_query($con,$check_email);
	   $check=mysqli_num_rows($run_email);
	   if($check==1){
		   echo"<script>alert(' Email or Phone is alredy exist please try again! ')</script>";
		   echo"<script>window.open('sign_up.php', '_self') </script>";
		   exit();
	   }
	   if($rand==1){
		   $profile_pic="image/paziyon.png";
		   
	   }
	   else if($rand==2){
		   $profile_pic="image/paziyon.jpg";
	   }
	   
	   $insert="INSERT INTO users(user_name,last_name,user_pass,user_email,user_profile,user_country,
	   user_gender,log_in) VALUES('$name','$last','$pass','$email','$profile_pic','$country',
	   '$gender','online')";
	   $query = mysqli_query($con,$insert);// to execute above sql command
	   if($query){
		   echo"<script>alert('Congratutalion $name $last,your account has been created sucsefufly')
		   </script>";
		   echo"<script>window.open('sign_in.php', '_self') </script>";
	   }
	   else{ 
		   echo"<script>alert('Registration is failed try again')</script>";
		   echo"<script>window.open('sign_up.php', '_self') </script>";
		   
	   }   
  }
?>