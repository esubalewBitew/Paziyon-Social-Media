<?php 
session_start();
include("include/connection.php");
$cookie_value=$_COOKIE["COOKIE_NAME"];
setcookie("COOKIE_NAME","$cookie_value",time()+7776000,"/");
$_SESSION['user_email']=$_COOKIE["COOKIE_NAME"];
$sql="SELECT * FROM users WHERE user_email='$cookie_value'";
$rtt=mysqli_query($con,$sql);
$fetid=mysqli_fetch_array($rtt);
$user_id=$fetid['user_id'];
$_SESSION['user_id']=$user_id;
$user_name=$fetid['user_name'];
if(!isset($_COOKIE["COOKIE_NAME"])){
header("Location:sign_in.php");//it replace from cpanel to index.php
}
else{
?>
<!Doctype html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE-edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
 <link rel="stylesheet"  type="text/css" href="css/main_homepagestyle.css">
 <link href="bootstrap/css/bootstrap.min.css"  rel="stylesheet">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto[Courgette|Pacifico:400,700" >
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <script src="jquery.js"></script>
 <style>
 @media only screen and (min-width:769px){
		 body{
	 background-image:url('image/yellow2.jpg');
	 background-size:100%;
	 background-attachment:fixed;
	 }
	 }
	 .CRLDBUTTON{
	display:flex;
	border:0px solid black;
	pading:20px;
	flex-wrap:wrap;
	flex-direction:row;
	justify-content:space-around;
	 }
	 .fotter{
	display:flex;
	border:0px solid black;
	padding-botto:10px;
	flex-wrap:wrap;
	flex-direction:row;
	justify-content:space-around;
	background-color:white;
	border-radius:12px 12px 0px 0px;
	 }
	 .header{
	display:flex;
	border:0px solid black;
	padding-bottm:10px;
	flex-wrap:wrap;
	flex-direction:row;
	justify-content:space-around;
	 }
	 .lklk{
		 
	display:flex;
	border:0px solid black;
	
	flex-wrap:wrap;
	flex-direction:row;
	justify-content:space-around;
	 }
	 .CRLDBUTTON button.glyphicon{
		 padding-left:15px;
		 padding-right:15px;
		  padding-top:4px;
		  padding-bottom:4px;
		 color:black;
		 border:0px;
		 border-radius:20px;
		 color:white;
		
	 }
	 .nmber{
		 padding-left:30px;
		 margin:0px
		 margin-left:30px;
	 }
	 .glyphicon-option-horizontal{
		 background-color:transparent;
		 color:orange;
		 border:0px;
		 font-size:20px;
		 font-weight:bold;
	 }
	 .homeppp{
		 border:2px solid silver;
		 margin-top:13px;
		 margin-bottom:13px;
		 padding:0px;
	 } 
	 .homeprofile{
		 border-radius:50%;
	 }
div.online{
	list-style-type:none;
	padding-bottom:0px;
	display:inline-block;
   width:47%;	
   margin-right:3px;
}
.onlinepeople{
	padding-bottom:0px;
   overflow-x:scroll;
   white-space:nowrap;
}
.addfriend1{
	border:1px solid silver;
	background-color:white;
}
 </style>
</head>
<body style=""><p></p>

 <?php 
	     	   global $con;
			   $user = $_COOKIE["COOKIE_NAME"];
			   $get_user="select * from users where user_email='$user'";
			   $run_user=mysqli_query($con,$get_user);//execute function
			   $row=mysqli_fetch_array($run_user);//know each value
			   $user_id=$row['user_id'];
			   $user_name=$row['user_name'];//accountant or owner of account
			   $user_profile=$row['user_profile'];
			   $_SESSION['pazioneth'] = $user_name;
			   $_SESSION['profile']= $user_profile;
			   $_SESSION['user_id']=$user_id;
			$sql="SELECT * FROM friend_request WHERE receiver_id='$user_id' 
			AND msg_content='REQUEST'";
			$run=mysqli_query($con,$sql);
			$num=mysqli_num_rows($run);
			$_SESSION['num']=$num;
		
			if(isset($_POST['friendlist'])){
				header("Location:include/friendlist.php");
			}
?>
<?php
	        global $con;
            $sele ="SELECT * FROM friends WHERE  main_id='$user_id' AND friend_id='$user_id'";
		    $run=mysqli_query($con,$sele);
			$roo=mysqli_num_rows($run);
			if($roo!=1){
		    $frie = "INSERT INTO friends (Main_name,friend,follow,content,main_id,friend_id)
		    VALUES('$user_name','$user_name','','friend','$user_id','$user_id')";
		     $run_user2=mysqli_query($con,$frie); 
			}
?>
<br><p></p>
<div class="home_form">
 <div class="header">
  <a href="main_setting.php" style="width:10%;float:left;">
  <button style="margin:4px;padding:2px;color:black;border-width:0px;
  background-color:transparent;color:#3A3A3A;font-size:20px;" 
  class="glyphicon glyphicon-tasks"></button></a>
  <div style="background-color:transparent;width:78%;
  border-radius:35px;margin-bottom:5px;border:1px solid silver;">

  <a href="searchbar.php">
  <button style="padding:5px;color:silver;border-width:0px;
  background-color:transparent;color:#3A3A3A;font-size:20px;  margin:-1px;padding-right:9px;"
  class="search_icon glyphicon glyphicon-search" name="search_icon"></button>
 </a>
  </div><a href="notification.php">
<img  style=""src="P ICONS/NOTIFICATION.png"/></a>
</div>
<div class="home_post">
 <br>
<p>
<span style="width:15%;"><img src="<?php echo $user_profile; ?>"></span>
<a href="postpart.php"><button style="width:72%;background-color:white;border:1px dotted orange">
<input style="border-width:0px;padding-left:5px;" type="text" name="post" class="posts"
placeholder="What do you think?">
</button></a>
<span style="float:right;margin-right:5px;"><a href="Photopost.php" style='width:15%;'>
<image style='' src="P ICONS/images.png"/></a></span>
</p>
<div class="onlinepeople">
 <?php 
 global $con;
 global $user_id;
 $get_user="SELECT * FROM users ORDER BY RAND() LIMIT 12";
	  $run_user=mysqli_query($con,$get_user);
	  while($row_user=mysqli_fetch_array($run_user)){
		  global $con;
		  $user_name=$row_user['user_name'];
	      $user_profile=$row_user['user_profile'];
		  $userr_id=$row_user['user_id'];
		   $sql="select * from friend_request where 
 (sender_id='$user_id' AND receiver_id='$userr_id') OR 
 (receiver_id='$user_id' AND sender_id='$userr_id')ORDER by 1 ASC";
 $execute=mysqli_query($con,$sql);
 $fetchhh=mysqli_fetch_array($execute);
		 $msgcc=$fetchhh['msg_content'];
		 if($msgcc!='REQUEST' && $msgcc!='DONE'){
 if(!($userr_id==$user_id)){
  echo"
   <div class='online'>        
		<div>
		<img style='height:60%;width:100%;border-radius:10px;' src= '$user_profile' />
		
	     <center style='font-family:italic;font-weight:bold;color:black;background-color:white;'> 
			  $user_name</center>
		</div>
		<span class='chat-left-detail'>
		<p style='margin-top:5px;margin-bottom:3px;width:20px;margin:0px;padding:0px;'>	 
 <center><button style='border-radius:0px;margin-right:2px;margin-top:4px;padding:4px;width:90%;
 color:orange;
 font-weight:bold;' data-id='$userr_id' class= 'addfriend1'>
  
	Add Friend </button><center>
	</p> 
    </span>
  </div>
  
  ";
 }
	  }
	  }
 ?>
 </div>
 <?php
 function updateInfo(){
	//comment
 $comnum ="SELECT * FROM home_comment WHERE main_id='$id'";
 $ruuu = mysqli_query($con,$comnum);
 $cNUM = mysqli_num_rows($ruuu);
 //like
 $likenum="SELECT * FROM home_liker WHERE cont_id='$id'";
 $lkrun=mysqli_query($con,$likenum);
 $LKNUM=mysqli_num_rows($lkrun);
 //dislike
 $Dlikenum="SELECT * FROM home_disliker WHERE cont_id='$id'";
 $Dlkrun=mysqli_query($con,$Dlikenum);
 $DLKNUM=mysqli_num_rows($Dlkrun);
 }
 global $con;
 //post part
 $sqq="SELECT * FROM home_post order by id desc";
 $run2=mysqli_query($con,$sqq);
 while($select3=mysqli_fetch_array($run2)){
 $pid = $select3['postman_id'];
 $sql="SELECT * FROM friends WHERE main_id = '$user_id'";
 $run1=mysqli_query($con,$sql);
 while($select2=mysqli_fetch_array($run1)){
 $friend=$select2['friend'];
 $friend_id=$select2['friend_id'];
 $mainH_id=$select2['main_id'];
if($pid == $friend_id){
 global $New;
 $user_id=$_SESSION['user_id'];
 $textcontent2=$select3['post_text'];
 $postname=$select3['postername'];
 $postphoto=$select3['photo'];
 $id=$select3['id'];
 $pid=$select3['postman_id'];
 //comment
 $comnum ="SELECT * FROM home_comment WHERE main_id='$id'";
 $ruuu=mysqli_query($con,$comnum);
 $cNUM=mysqli_num_rows($ruuu);
 //like
 $likenum="SELECT * FROM home_liker WHERE cont_id='$id'";
 $lkrun=mysqli_query($con,$likenum);
 $LKNUM=mysqli_num_rows($lkrun);
 //dislike
 $Dlikenum="SELECT * FROM home_disliker WHERE cont_id='$id'";
 $Dlkrun=mysqli_query($con,$Dlikenum);
 $DLKNUM=mysqli_num_rows($Dlkrun);
 
 if($postphoto == ""){
 $sql="SELECT * FROM users WHERE user_id='$friend_id'";
 $run=mysqli_query($con,$sql);
 $select=mysqli_fetch_array($run);
 $prof=$select['user_profile'];
 echo"
 <li>
 <div class='rightside-chat'>
 <p styl='margin:3px;background-color:#FFBF00;color:black;'>
 <img class='homeprofile' src='$prof'/>
 $postname";
  if($user_id==$pid){
	 echo"<span style='float:right;margin-right:10px;'>
 <button data-id='$id' class='Adminicon glyphicon glyphicon-option-horizontal'></button></span>
 ";
 }
 echo"
 <br><p>
 $textcontent2 
<hr style='padding:0px;margin:0px;'/> 
 </p>
 </div>
 "; 
 $_SESSION['baiscinfo']=$id;
 //personal($id);
  echo"
 <span class='CRLDBUTTON'>
 <button id='LIKE $id' data-id='$id' class='like glyphicon glyphicon-thumbs-up' style='color:orange;''>1 $LKNUM</button>
 <button data-id='$id' class='dislike  glyphicon glyphicon-thumbs-down ' style='color:orange;'> $DLKNUM</button>
 <button  class='comment glyphicon' data-id='$id' style='color:orange;'><image style='height:18px;width:18px;' src='P ICONS/COMMENT 2.png'/> $cNUM</button>
 <button data-id='$id' class='comment glyphicon glyphicon-share-alt' style='color:orange;'> </button>
 </span>";
 echo"
 </li><p class='homeppp'></p>
 ";
 }
 else if($textcontent2 == ""){
 $sql="SELECT * FROM users WHERE user_id='$friend_id'";
 $run=mysqli_query($con,$sql);
 $select=mysqli_fetch_array($run);
 $prof=$select['user_profile'];
 
 echo"
 <li class=''>
 <div class='rightside-chat'>
 <p styl='margin:3px;background-color:#FFBF00;color:black;'>
 <img  class='homeprofile' src='$prof'/>
 $postname";
 if($user_id == $pid){
	 echo"<span style='float:right;margin-right:10px;'>
 <button data-id='$id' class='Adminicon glyphicon glyphicon-option-horizontal' ></button></span>
 ";
 }
 echo"
 <br><p>
 <img style='height:auto;width:100%;border-radius:10px;' src='$postphoto' />
 <hr style='padding:0px;margin:0px;'/></p>
 </p>
 
 <span class='CRLDBUTTON'>
 <button data-id='$id' class='like glyphicon glyphicon-thumbs-up ' style='color:orange;'>2 $LKNUM</button>
 
 <button data-id='$id' class='dislike glyphicon glyphicon-thumbs-down' style='color:orange;'>$DLKNUM</button>
 <button 
 class='comment glyphicon' data-id='$id' style='color:orange;'><image style='height:18px;width:18px;' src='P ICONS/COMMENT 2.png'/> $cNUM</button>
 <button data-id='$id' class='comment glyphicon glyphicon-share-alt' style='color:Orange;'> </button>
 </span>
 </div>
 <li>
  <p class='homeppp'></p>";
 }
 else{
	 $sql="SELECT * FROM users WHERE user_id='$friend_id'";
 $run=mysqli_query($con,$sql);
 $select=mysqli_fetch_array($run);
 $prof=$select['user_profile'];
 $sqqq="SELECT * FROM ";
 echo "
 <li class=''>
 <div class='rightside-chat'>
 <p styl='margin:3px;background-color:#FFBF00;color:black;'>
 <img  class='homeprofile' src='$prof'/>
 $postname";
 if($user_id==$pid){
	 echo" <span style='float:right;margin-right:10px;'>
 <button data-id='$id' class='Adminicon glyphicon glyphicon-option-horizontal' ></button></span>
 ";
 }
 echo "
 <br><p>
 $textcontent2</p><p>
 <img style='height:auto;width:100%;border-radius:10px;' src='$postphoto' /><br>
<hr style='padding:0px;margin:0px;'/></p>
 <span class='CRLDBUTTON'>
 <button  data-id='$id' class='like glyphicon glyphicon-thumbs-up' style='color:orange;'>3 $LKNUM</button>
 <button data-id='$id' class='dislike  glyphicon glyphicon-thumbs-down ' style='color:orange;'> $DLKNUM</button>
 <button  class='comment glyphicon' data-id='$id' style='color:orange;'><image style='height:18px;width:18px;' src='P ICONS/COMMENT 2.png'/> $cNUM</button>
 <button data-id='$id' class='comment glyphicon glyphicon-share-alt' style='color:orange;'> </button>
 </span>
 </p>
 </div>
<li><p class='homeppp'></p>
 ";
 }
 }
 }
 }
 ?>
 
 </div>
 <div class="fotter">
 <li class="icon"><button  class="ttt" style="background-color:transparent;">
 <image style="background-color:transparent;height:23px;width:23px;margin-top:8px;"
 src="P ICONS/HOME ON LINK.png"></button></li> 
 <li class="icon"><a href="Group page.php"><button  class="ttt glyphicon" style="background-color:transparent;">
 <image style="height:39px;width:39px;" src="P ICONS/GROUP.png"></button></a> </li>  
 <li class="icon"><a href="Chats_message.php"><button style="background-color:transparent;"
 class="ttt"><image style="margin-top:3px;background-color:transparent;"src="P ICONS/chat.png"></button></a></li> 
 <li class="icon"><a href="pagesystemlist.php"><button style="margin-top:4px;background-color:transparent;"class="ttt">
 <image  src="P ICONS/BLOG - PAGE.png"></button> </a></li> 
 <li class="icon"><a href="profile_page_own.php"><button style="margin-top:8px;background-color:transparent;" class="ttt"
 ><image style="height:28px;width:28px;" src="P ICONS/PROFILE (2).png"></button></a></li>
 </div>          
</div>
</body>
</html>
<?php } ?>
<script>
  	//when u click delete
	$(document).ready(function(){
	$(document).on('click','.delete',function(){
		 var id= $(this).data('id');
         if(confirm("Are you sure want to delete this? ")){
		 var $clicked_btn=$(this);
		 //alert($(this).data('id'));
		$.ajax({
			url:"delete_content.php",
			method:'POST',
			data:{id:id},
			dataType:"text",
			success:function(){
				//remove deleted comment
          
				window.open("Main_homepage.php","_self");
				
			}
		});
		 }
	});
	
	//comment part
	$(document).on('click','.comment',function(){
		 var id= $(this).data('id');
         
		 var $clicked_btn=$(this);
		 //alert($(this).data('id'));
		$.ajax({
			url:"comment2.php",
			method:'POST',
			data:{id:id},
			dataType:"text",
			success:function(){
				//remove deleted comment
          
				window.open("comment1.php","_self");
				
			}
		});
		 
	});
	//like part
	$(document).on('click','.like',function(){
		 var id= $(this).data('id');
		 var $clicked_btn=$(this);
		 //alert($(this).data('id'));
		$.ajax({
			url:"homeliker.php",
			method:'POST',
			data:{id:id},
			dataType:"text",
			success:function(response){
				//liker  part
				//window.open("NumofUserFeedBack.php","_self");
				//$('#LIKE').html(response);
				//window.alert(id);
	         //updateInfo2(id);
			 window.open("Main_homepage.php","_self");
			}
		}); 
	});
	//dislike part
	$(document).on('click','.dislike',function(){
		 var id= $(this).data('id');
		 var $clicked_btn=$(this);
		 //alert($(this).data('id'));
		$.ajax({
			url:"homedisliker.php",
			method:'POST',
			data:{id:id},
			dataType:"text",
			success:function(){
				//liker  part
				window.open("Main_homepage.php","_self");
				
			}
		});
		 
	});
	//for admin use
	$(document).on('click','.Adminicon',function(){
		 var id= $(this).data('id');
         
		 var $clicked_btn=$(this);
		 //alert($(this).data('id'));
		$.ajax({
			url:"Adminicon_setting.php",
			method:'POST',
			data:{id:id},
			dataType:"text",
			success:function(){
				//liker  part
          
				window.open("Adminpostsetting.php","_self");
				
			}
		});
		 
	});
	//admin friend on homepage
		$(document).on('click','.addfriend1',function(){
		 var id= $(this).data('id');
		 var $clicked_btn=$(this);
		 //alert($(this).data('id'));
		$.ajax({
			url:"include/Addfriendsent.php",
			method:'POST',
			data:{id:id},
			dataType:"text",
			success:function(data){
				//remove deleted comment
            //alert(data);
				window.open("Main_homepage.php","_self");
			}
		});
		 
	});
	});
</script>
<script>	
function updateInfo2(num){	
	$(document).ready(function (){
	window.alert(num);
	/*setInterval(function(){
		$('#id').load('NumofUserFeedBack.php')
	},100);	*/
});
}
</script>
 