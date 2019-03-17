<?php
	session_start();
	if(!isset($_SESSION['user']))
	{
		session_destroy();
		header('location:login.php');
	}
	else
		echo "You are logged in as ".$_SESSION['user']."<br>";
	if(isset($_GET['logout']))
	{
		session_unset();
		session_destroy();
		setcookie('user[0]',"",time()-3600,"/");
		setcookie('user[1]',"",time()-3600,"/");
		header('location:login.php');
	}
?>
<form method="get">
	<input type="submit" value="Logout" name="logout">
</form>