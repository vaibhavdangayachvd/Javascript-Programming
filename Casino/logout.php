<?php
	error_reporting(0);
	require 'includes/check_login.php';
	setcookie('user[0]','',time()-3600,'/');
	setcookie('user[1]','',time()-3600,'/');
	session_destroy();
	header('location:login.php');
?>