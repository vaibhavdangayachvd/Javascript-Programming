<?php
	error_reporting(0);
	$fn=$ln=$un=$pw=$em=$ph="";
	require 'includes/connection.php';
	if(!$db)
		$err="Not Connected To Database";
	else 
		$err="Connected To Database";
	if(isset($_POST['register']) && $db)
	{
		$fn=$_POST['first'];
		$ln=$_POST['last'];
		$un=$_POST['username'];
		$pw=$_POST['password'];
		$em=$_POST['email'];
		$ph=$_POST['phone'];
		$gen=$_POST['gender'];
		
		$chkuser="select * from users where username='$un'";
		$chkemail="select * from users where email='$em'";
		$chkphone="select * from users where phone='$ph'";
		
		$chkuser=mysqli_query($db,$chkuser);
		$chkemail=mysqli_query($db,$chkemail);
		$chkphone=mysqli_query($db,$chkphone);
		
		
		if(mysqli_num_rows($chkuser)>0)
			$err="Username Already Exist !!";
		else if(mysqli_num_rows($chkemail)>0)
			$err="Email Already Exist !!";
		else if(mysqli_num_rows($chkphone)>0)
			$err="Mobile Already Exist !!";
		else
		{
			$pw=sha1($pw);
			$query="insert into users(first,last,username,password,email,phone,gender,balance) values('$fn','$ln','$un','$pw','$em','$ph','$gen',5000)";
			mysqli_query($db,$query);
			header('location:login.php');
		}
	}
?>
<html>
	<head>
		<title>Register Account</title>
	
        <link rel="stylesheet" type="text/css" href="css/register.css">
        	<script src="scripts/register.js"></script>
	</head>
	<body>
		<div class="register">
			<fieldset>
				<legend align="center">Create new user</legend>
				<form name="registration" method="post" onSubmit="return check();">
					<h1>Enter Details</h1>
					<p>First Name</p>
					<input type="text" value="<?php echo $fn;?>" name="first" placeholder="Enter First Name" maxlength="15">
					<p>Last Name</p>
					<input type="text" value="<?php echo $ln;?>" name="last" placeholder="Enter Last Name" maxlength="15">
					<p>Username</p>
					<input type="text" value="<?php echo $un;?>" name="username" placeholder="Choose Username" maxlength="30">
					<p>Password</p>
					<input type="password" value="<?php echo $pw;?>" name="password" placeholder="Enter Password" maxlength="30">
					<p>Re-Password</p>
					<input type="password" value="<?php echo $pw;?>" name="rpassword" placeholder="ReEnter Password" maxlength="30">
					<p>Email</p>
					<input type="text" value="<?php echo $em;?>" name="email" placeholder="Enter Email Address" maxlength="30">
					<p>Mobile</p>
					<input type="text" value="<?php echo $ph;?>" name="phone" placeholder="Enter Mobile Number" maxlength="10">
					<p class="para">Gender</p><br>
					<input type="radio" name="gender" value="male">Male
					<input type="radio" name="gender" value="female">Female
					<p align="center">
						<?php 
							if($db)
								echo'<input type="submit" value="Create Account" name="register">';
							else
								echo'<input disabled type="submit" value="Create Account" name="register">';
						?>
					</p>
					<p align="center">
						<?php echo $err;?>
					</p>
				</form>
			</fieldset>
		</div>
	</body>
</html>