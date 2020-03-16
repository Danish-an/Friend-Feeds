<?php  
	include("../../config/config.php");
	include("../classes/User.php");
	include("../classes/Message.php");

	$limit=100; //Number of Messages to be loaded ye to change kar lena mene 100 rakha hu ajax limit hai ye message load limit hai na haok

	$message=new Message($con,$_REQUEST['userLoggedIn']);
	echo $message->getCanvasDropdown($_REQUEST,$limit);
?>