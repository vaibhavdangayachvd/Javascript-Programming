<?php
	error_reporting(0);
	$fn=$ln=$un=$pw=$em=$ph="";
	require 'connection.php';
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
			$query="insert into users(first,last,username,password,email,phone,gender,balance) values('$fn','$ln','$un','$pw','$em','$ph','$gen',500)";
			mysqli_query($db,$query);
			header('location:login.php');
		}
	}
?>
<html>
	<head>
		<title>Register Account</title>
	
        <link rel="stylesheet" type="text/css" href="css/register.css">
        	<script>
			function check(){
				var nm=/^[a-z A-Z]{3,15}$/;
				var un=/^[a-z A-Z 0-9]{3,30}$/;
				var pw=/^[a-z A-Z 0-9 @ -]{3,30}$/;
			    var em=/^[a-z A-Z 0-9]{3,20}@[a-z]{4,6}\.[a-z]{3}$/;
				var ph=/^[1-9]{1}[0-9]{9}$/;
				if (document.registration.first.value==""){
					document.registration.first.focus();
					return false;
				}
				else if (nm.test(document.registration.first.value)==false){
					alert('First Name should only contain a-z size 3-15')
					document.registration.first.focus();
					return false;
				}
				else if(document.registration.last.value==""){
					document.registration.last.focus();
					return false;
				}
				else if (nm.test(document.registration.last.value)==false){
					alert('Last Name should only contain a-z size 3-15')
					document.registration.last.focus();
					return false;
				}
				else if(document.registration.username.value==""){
					document.registration.username.focus();
					return false;
				}
				else if (un.test(document.registration.username.value)==false){
					alert('Username should only contain a-z A-Z 0-9 size 3-30')
					document.registration.username.focus();
					return false;
				}
				else if(document.registration.password.value==""){
					document.registration.password.focus();
					return false;
				}
				else if (pw.test(document.registration.password.value)==false){
					alert('Password should only contain a-z A-Z 0-9 size 3-30')
					document.registration.password.focus();
					return false;
				}
				else if(document.registration.rpassword.value==""){
					document.registration.rpassword.focus();
					return false;
				}
				else if (pw.test(document.registration.rpassword.value)==false){
					alert('Password should only contain a-z A-Z 0-9 size 3-30')
					document.registration.rpassword.focus();
					return false;
				}
				else if(document.registration.password.value!=document.registration.rpassword.value)
				{
					document.registration.rpassword.value="";
					alert('Passwords Do Not Match');
					document.registration.rpassword.focus();
					return false;
				}
				else if(document.registration.email.value==""){
					document.registration.email.focus();
					return false;
				}
				else if(em.test(document.registration.email.value)==false){
					alert('Incorrect Email');
					document.registration.email.focus();
					return false;
				}
				else if(document.registration.phone.value==""){
					document.registration.phone.focus();
					return false;
				}
				else if(ph.test(document.registration.phone.value)==false){
					alert('Phone number should be of 10 digit not starting from 0');
					document.registration.phone.focus();
					return false;
				}
				else if(document.registration.gender.value==""){
					alert('Gender is Mendatory');
					return false;
				}
				else
					return true;
			}
		</script>
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