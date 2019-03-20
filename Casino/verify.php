<?php
	error_reporting(0);
	if(isset($_REQUEST['id']))
	{
		require 'includes/connection.php';
		$em=$_REQUEST['id'];
		$pw=$_REQUEST['pw'];
		$query="select active from users where email='$em'";
		$query=mysqli_query($db,$query);
		$query=mysqli_fetch_array($query);
		$query=sha1($query['active']);
		if(!strcmp($query,$pw))
		{
			$query="update users set active=0 where email='$em'";
			mysqli_query($db,$query);
		}
	}
	header('location:login.php');
?>