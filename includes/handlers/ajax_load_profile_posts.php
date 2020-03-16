<?php  
	include("../../config/config.php");
	include("../classes/User.php");
	include("../classes/Post.php");

	$limit=100; //Number of Post loaded per call also same
	
	$posts=new Post($con,$_REQUEST['userLoggedIn']);
	$posts->loadProfilePosts($_REQUEST,$limit);
?>