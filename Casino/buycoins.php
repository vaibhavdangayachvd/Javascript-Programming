<?php
	require "includes/check_login.php";
	if(isset($_SESSION['guest']))
		header('location:index.php');
?>
<html>
	<head>
		<title>Buy Coins</title>
		<script>
			function check(){
				if(document.buycoin.pack.value=="")
				{
					window.alert('Choose a pack first');
					return false;
				}
				return true;
			}
		</script>
	</head>
	<body>
		<form name="buycoin" method="post" action="checkout.php" onSubmit="return check()">
			<table align="center" border="2">
				<tr>
					<th>Pack</th>
					<th>Coins</th>
					<th>Price</th>
					<th>Choose</th>
				</tr>
				<tr>
					<td>Coin Pack 1</td>
					<td>10,000</td>
					<td>10rs</td>
					<td><input type="radio" name="pack" value="10"></td>
				</tr>
				<tr>
					<td>Coin Pack 2</td>
					<td>1,00,000</td>
					<td>50rs</td>
					<td><input type="radio" name="pack" value="50"></td>
				</tr>
				<tr align="center">
					<td colspan="4">
						<input type="submit" value="Buy Now" name="buy">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>