<?php
   include("include/connection.php");
   session_start();
?>
<!Doctype html> 
<html>
 <head>
 <title>home_comment part</title>
 <script>
 </script>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
   <link href="bootstrap/css/bootstrap.min.css"  rel="stylesheet">
     <link rel="stylesheet" href="CLRD/home_comment.css">
	 <style>
	 	@media only screen and (min-width:769px){
 body{
		 background-image:url('image/yellow2.jpg');
	 background-size:100%;
	 background-attachment:fixed;
	 }}
	 </style>
 </head>
 <body>
 <div class="mainbody">
 <div class="row-1">
   <?php
   $idcomment=$_SESSION['idcomment'] ;
   $sql="SELECT * FROM home_post WHERE id='$idcomment'";
   $runn=mysqli_query($con,$sql);
   $select=mysqli_fetch_array($runn);
   $ptext=$select['post_text'];
   $Photo1=$select['photo'];
   $postername=$select['postername'];
  
   ?>
 </div>
 <div>
 <?php
 $iddd = $_SESSION['pazioneth'];
 $user_profile = $_SESSION['profile'];
 $user_id = $_SESSION['user_id'];//checkinggg
 ?>
 <h4 class="h3commnet"><a href="Main_homepage.php" class="glyphicon glyphicon-arrow-left">
 </a>&nbsp;&nbsp;comments on&nbsp;&nbsp;<?php echo $postername; ?>&nbsp;&nbsp;posts</h4>
    <div>
	   <?php
      if($Photo1==""){
	   echo "<p class='textcomment'>$ptext</p>";
	  }
	  else{
		echo "<img class='abovephoto' src='$Photo1'/>";  
	  }
	   ?>
	   <hr/>
	</div>
 </div>
 <div >
     <form method="POST" action="" >
	 <img class="profphoto" src="<?php echo $_SESSION['profile']; ?>">
	 <input class="formcontrol" type="text" name="comment" id="comment" 
	 placeholder="write your commment..." autocomplete="off" required />
	 <input type="submit" value="comment" name="submit" class="comment" />
	 </form>
 </div>
 
 <div>
    
	<div class="homepost">
	   <?php
	$com="SELECT * FROM home_comment WHERE main_id ='$idcomment'";
	$comrun=mysqli_query($con,$com);
	while($row=mysqli_fetch_array($comrun)){
		$conttt=$row['content'];
		$guest_ids=$row['guest_id'];
		$photo="SELECT * FROM users WHERE user_id='$guest_ids'";
		$runnnn=mysqli_query($con,$photo);
		$cols=mysqli_fetch_array($runnnn);
		$profiles=$cols['user_profile'];
		$name=$cols['user_name'];
		$lname=$cols['last_name'];
		echo"
		<div class='commented-list'>
		
		     <img class='profphoto' src='$profiles'/>
			 $name
		     <p id='comment'>$conttt</p>
		</div>
		<p></p>
		";
	}
	?>
	</div>
	<?php
	if(isset($_POST['submit'])){
		$content=$_POST['comment'];
		$sqll="INSERT INTO home_comment(main_id,content,guest_name,guest_id,date)
		VALUES('$idcomment','$content','$name','$user_id',NOW())";
		$runnn=mysqli_query($con,$sqll);
		if($runnn){
	$selectss = "SELECT * FROM notification WHERE cont_id = '$idcomment' AND type = 'Comment'";
	 $runid=mysqli_query($con,$selectss);
	 $num=mysqli_num_rows($runid);
	 if($num > 0){
		 $featch = mysqli_fetch_array($runid);
		 $value =$featch['countNum'] + 1;
		 $update="update notification set countNum = '$value' where cont_id = '$idcomment' AND type='Comment'";
		  $run=mysqli_query($con,$update);
		   $insert2="INSERT INTO notification (type,post_id,cont_id,countNum)
		 VALUES('Comment','111','$idcomment','177')";
		 //$result=mysqli_query($con,$insert2);
		 
	 }else{
		 $insert2="INSERT INTO notification (type,post_id,cont_id,countNum)
		 VALUES('Comment','2323232','$idcomment','1')";
		 $result=mysqli_query($con,$insert2);
	 }
			header("Location:comment1.php");
			
		}
		
	}
	?>
 </div>
 </div>
 </body>
</html>