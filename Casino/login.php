<?php
	error_reporting(0);
	$un=$pw="";
	require 'connection.php';
	if(!$db)
		$err="Not Connected To Database";
	else 
		$err="Connected To Database";
	if(isset($_POST['login'])|| isset($_COOKIE['user']))
	{
		if(isset($_COOKIE['user']))
		{
			$un=$_COOKIE['user'][0];
			$pw=$_COOKIE['user'][1];
		}
		else
		{
			$un=$_POST['user'];
			$pw=sha1($_POST['password']);
		}
		$query="select * from users where username='$un' or email='$un' or phone='$un'";
		$query=mysqli_query($db,$query);
		if(!mysqli_num_rows($query))
		{
			$err="Username Not found !!";
			$pw="";
		}
		else
		{
			$query="select * from users where password='$pw' and (username='$un' or email='$un' or phone='$un')";
			$query=mysqli_query($db,$query);
			if(!mysqli_num_rows($query))
			{
				$err="Incorrect Password !!";
				$pw="";
			}
			else
			{
				setcookie('user[0]',$un,time()+86400*30,"/");
				setcookie('user[1]',$pw,time()+86400*30,"/");
				$err="Login Successful !!";
				session_start();
					$_SESSION['user']=$un;
				header('location:index.php');
			}
		}
	}
?>
<html>
	<head>
		<title>Login Account</title>
		<script>
			function check(){
				if(document.logging.user.value == ""){
					document.logging.user.focus();
					return false;
				}
				else if(document.logging.password.value == ""){
					document.logging.password.focus();
					return false;
				}
				else
					return true;
			}
		</script>
	</head>
	<body>
		<form name="logging" method="post" onSubmit="return check()">
			<table align="center" border="2">
				<tr>
					<td>Username/email/phone</td>
					<td><input type="text" name="user" value="<?php echo $un?>" placeholder="Enter Login" maxlength="30"></td>
				</tr>
					<td>Enter Password</td>
					<td><input type="password" name="password" value="<?php echo $pw?>" placeholder="Enter Password" maxlength="30"></td>
				<tr>
					<td colspan="2" align="center">
						<?php
							if($db)
							{
								?>
								<input type="submit" value="Login" name="login">
								<button type="button" onClick="window.location.href = 'register.php';">Register</button>
								<?php
							}
							else
							{
								?>
								<input disabled type="submit" value="Login" name="login">
								<button type="button" onClick="window.location.href = 'register.php';">Register</button>
								<?php
							}
						?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<?php echo $err;?>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>