<?php
	require 'includes/check_login.php';
	require 'includes/connection.php';
	$res=array("","");
	$ssn = $_SESSION['user'];
	$query="select balance from users where id='$ssn'";
	$bal=mysqli_query($db,$query);
	$bal=mysqli_fetch_array($bal);
	$bal=$bal['balance'];
	if(isset($_REQUEST['head']) || isset($_REQUEST['tail']))
	{
		$bet=$_REQUEST['bet'];
		if($bet<=$bal)
		{
			$res=rand(0,1);
			if(($res && isset($_REQUEST['tail'])) || (!$res && isset($_REQUEST['head'])))
			{
				$bal+=$bet;
				$res="You Win ".$bet." Coins :)";
				$res=array($res,1);
			}
			else
			{
				$bal-=$bet;
				$res="You Lose ".$bet." Coins :(";
				$res=array($res,0);
			}
			$query="update users set balance=$bal where id='$ssn'";
			mysqli_query($db,$query);
		}
	}
?>
<html>
	<head>
		<title>Head Tails</title>
		<script src="scripts/betting.js"></script>
	</head>
	<body>
		<h1>Play Head Tails</h1>
		<h2>Steps to play :-</h2>
		<ol>
			<li>Choose a bet between 50 to 25 Lakh</li>
			<li>Choose Between Head and Tail</li>
			<li>Click To Play</li>
		</ol>
		<h2>Prize</h2>
		<p>If you win, you will get double the amount you betted</p>
		<fieldset>
			<legend align="center">Play</legend>
			<form method="post" name="betting" onSubmit="return check()">
				<?php
					if($res[1]){
						?>
						<input style="border:0;background-color:white;font-weight:bold;color:green;width:250px;" disabled type="text" value="<?php echo $res[0];?>" name="result"><br>
						<?php
					}
					else{
						?>
						<input style="border:0;background-color:white;font-weight:bold;color:red;width:250px;" disabled type="text" value="<?php echo $res[0];?>" name="result"><br>
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
				<p>Choose Head or Tail</p>
				<input type="submit" value="Head" name="head"> <input type="submit" value="Tail" name="tail">
			</form>
		</fieldset>
	</body>
</html>