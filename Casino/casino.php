<?php
	error_reporting(0);
	require 'includes/check_login.php';
?>
<html>
	<head>
		<title>Play Casino</title>
	</head>
	<body>
		<h1>Welcome to HOME CASINO</h1>
		<h2>Choose Game</h2>
		<form>
			<input type="button" onClick="window.location.href='headtail.php';" value="Head Tails">
			<input type="button" onClick="window.location.href='updown.php';" value="7Up7Down">
			<input type="button" onClick="window.location.href='stonepaper.php';" value="Stone Paper Scissors">
		</form>
	</body>
</html>