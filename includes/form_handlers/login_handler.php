<?php 
	if(isset($_POST['login_button']))
	{
		$email=filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //Sanitize E-Mail (E-Mail Format)
		$_SESSION['log_email']=$email; //Store E-Mail into Session variable
		$password=md5($_POST['log_password']); //Encrypt the Password

		$check_database_query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
		$check_login_query=mysqli_num_rows($check_database_query);//login email 

		if($check_login_query == 1)// ek hi name ka hona chaye
		{
			$row=mysqli_fetch_array($check_database_query);//row to array 
			$username=$row['username'];

			$user_closed_query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND user_closed='yes'");

			if(mysqli_num_rows($user_closed_query) == 1)
			{
				$reopen_account=mysqli_query($con,"UPDATE users SET user_closed='no' WHERE email='$email'");
			}

			$_SESSION['username']=$username;
			header("Location: index.php");
			exit();
		}
		else
		{
			array_push($error_array, "E-Mail or Password is Incorrect <br>");
		}


	}
?>