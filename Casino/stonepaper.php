<?php
	error_reporting(0);
	require 'includes/check_login.php';
	require 'includes/connection.php';
	$res=array("","");
	$ssn = $_SESSION['user'];
	$query="select balance from users where id='$ssn'";
	$bal=mysqli_query($db,$query);
	$bal=mysqli_fetch_array($bal);
	$bal=$bal['balance'];
	if(isset($_REQUEST['stone']) || isset($_REQUEST['paper']) || isset($_REQUEST['sci']))
	{
		$bet=$_REQUEST['bet'];
		if($bet<=$bal)
		{
			$res=rand(1,3);
			if(($res==1 && isset($_REQUEST['paper'])) || ($res==2 && isset($_REQUEST['sci'])) || ($res==3 && isset($_REQUEST['stone'])))
			{
				$bal+=$bet;
				switch($res)
				{
				case 1:
					$res="Output : Stone"." - You Win ".$bet." Coins :)";
					break;
				case 2:
					$res="Output : Paper"." - You Win ".$bet." Coins :)";
					break;
				case 3:
					$res="Output : Scissor"." - You Win ".$bet." Coins :)";
					break;
				}
				$res=array($res,1);
				$query="update users set balance=$bal where id='$ssn'";
				mysqli_query($db,$query);
			}
			else if(($res==1 && isset($_REQUEST['stone'])) || ($res==2 && isset($_REQUEST['paper'])) || ($res==3 && isset($_REQUEST['sci'])))
			{
				$res="Output : Same !! Try again !!";
				$res=array($res,2);
			}
			else
			{
				$bal-=$bet;
				switch($res)
				{
				case 1:
					$res="Output : Stone"." - You Lose ".$bet." Coins :(";
					break;
				case 2:
					$res="Output : Paper"." - You Lose ".$bet." Coins :(";
					break;
				case 3:
					$res="Output : Scissor"." - You Lose ".$bet." Coins :(";
					break;
				}
				$res=array($res,0);
				$query="update users set balance=$bal where id='$ssn'";
				mysqli_query($db,$query);
			}
		}
	}
?>
<html>
	<head>
		<title>Stone Paper Scissors</title>
		<script src="scripts/betting.js"></script>
	</head>
	<body>
		<h1>Play Stone Paper Scissors</h1>
		<h2>Steps to play :-</h2>
		<ol>
			<li>Choose a bet between 50 to 25 Lakh</li>
			<li>Choose among stone,paper and scissor.</li>
			<li>Click to Play</li>
			<li>Stone Win against Scissor , Paper win against Stone and Scissor Win Against Paper</li>
			<li>*If the answer is same the you will choose again until someone win*</li>
		</ol>
		<h2>Prize</h2>
		<p>If you win, you will get triple the amount you betted</p>
		<fieldset>
			<legend align="center">Play</legend>
			<form method="post" name="betting" onSubmit="return check()">
				<?php
					if($res[1]==1){
						?>
						<input style="border:0;background-color:white;color:green;font-weight:bold;width:250px;" disabled type="text" value="<?php echo $res[0];?>" name="result"><br>
						<?php
					}
					else if($res[1]==0){
						?>
						<input style="border:0;background-color:white;font-weight:bold;color:red;width:250px;" disabled type="text" value="<?php echo $res[0];?>" name="result"><br>
						<?php
					}
					else{
						?>
						<input style="border:0;background-color:white;font-weight:bold;color:orange;width:250px;" disabled type="text" value="<?php echo $res[0];?>" name="result"><br>
						<?php
					}
				?>
				<p>Coin Balance</p>
				<input disabled type="text" value="<?php echo $bal;?>" name="balance">
				<p>Current Bet</p>
				<input style="border:0;background-color:white;color:red;width:250px;" disabled type="text" value="" name="notification"><br>
				<input disabled type="text" value="0" name="bet">
				<input type="button" value="Reset" onClick="reset_bet()"><br><br>
				<input type="button" value="50" onClick="increase_bet(50)">
				<input type="button" value="100" onClick="increase_bet(100)">
				<input type="button" value="500" onClick="increase_bet(500)"><br><br>
				<input type="button" value="2500" onClick="increase_bet(2500)">
				<input type="button" value="10000" onClick="increase_bet(10000)">
				<input type="button" value="50000" onClick="increase_bet(50000)"><br><br>
				<input type="button" value="100K" onClick="increase_bet(100000)">
				<input type="button" value="200K" onClick="increase_bet(200000)">
				<input type="button" value="500K" onClick="increase_bet(500000)"><br><br>
				<input type="button" value="1M" onClick="increase_bet(1000000)">
				<input type="button" value="2M" onClick="increase_bet(2000000)">
				<input type="button" value="4M" onClick="increase_bet(4000000)"><br><br>
				<input type="button" value="10M" onClick="increase_bet(10000000)">
				<input type="button" value="15M" onClick="increase_bet(15000000)">
				<input type="button" value="25M" onClick="increase_bet(25000000)"><br><br>
				<p>Choose Stone,Paper,Scissors</p>
				<input type="submit" value="Stone" name="stone"> <input type="submit" value="Paper" name="paper"> <input type="submit" value="Scissors" name="sci">
			</form>
		</fieldset>
	</body>
</html>