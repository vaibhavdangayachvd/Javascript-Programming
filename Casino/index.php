<?php
	error_reporting(0);
	require 'includes/check_login.php';
	require 'includes/connection.php';
	$name=$_SESSION['user'];
	$name="select first,last from users where id='$name'";
	$name=mysqli_query($db,$name);
	$name=mysqli_fetch_array($name);
	$name=$name['first'].' '.$name['last'];
	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home casino</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
 <link rel="icon" type="image/jpg" href="images/favixon.png">
 <link href="css/animate.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="section_01 bgcolor">
<div class="animated bounceInLeft " >
<div class="col-md-8">
</div>
<div class="col-md-1">
<img src="images/facebook1.png" class="img-responsive" height="35px" width="35px"/ style="margin-left:250px"/>
</div>
<div class="col-md-1">
<img src="images/pinterest.png"" class="img-responsive" height="35px" width="35px" style="margin-left:180px"/>
</div>
<div class="col-md-1">
<img src="images/g+.png" class="img-responsive" height="35px" width="35px" style="margin-left:110px"/>
</div>
<div class="col-md-1">
<img src="images/instagram2.png" class="img-responsive"height="35px" width="35px" style="margin-left:40px" />
</div>
</div>
</div>
<div class="section_02 color1">
<div class="col-md-4">
<img src="images/nlogo.png"/> 
</div>
<div class="col-md-8">
<p style="color:white; word-spacing:5px;padding-top:55px">
<i>Logged in as <?php echo $name;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
 <a href="casino.php" style="color:white;font-weight:bold;">GAMBLING</a>&nbsp;&nbsp;<a href="crosszero.php" style="color:white;font-weight:bold;">PLAY-CROSS-ZERO</a>&nbsp;&nbsp;<a href="#abtus" style="color:white;font-weight:bold;">ABOUTUS</a>&nbsp;&nbsp;<a href="#contact" style="color:white;font-weight:bold;">CONTACTUS</a>&nbsp;&nbsp;<a href="logout.php" style="color:white;font-weight:bold;">LOGOUT</a>
 </p>
</div>
</div>
<div class="section_03 ">

</div>

<div class="section_04 bgcolor">

<div class="col-md-1 ">
<img src="images/facebook1.png" class="img-responsive" height="35px" width="35px"/ style="margin-left:-15px"/>
</div>
<div class="col-md-1">
<img src="images/pinterest.png"" class="img-responsive " height="35px" width="35px" style="margin-left:-90px"/>
</div>
<div class="col-md-1">
<img src="images/g+.png" class="img-responsive" height="35px" width="35px" style="margin-left:-165px"/>
</div>
<div class="col-md-1">
<img src="images/instagram2.png" class="img-responsive "height="35px" width="35px" style="margin-left:-240px" />
</div>
<div class="col-md-8">
<form method="post"  style="margin-top:1em;" class="pull-right">
 Give Your Email Id For Latest Notifications.
 <input type="email" name="notificationemail" />
 <input type="submit" value="submit" class="btn-primary" name="btn-notify" />
 </form>
</div>

</div>

<div class="section_05 color2">
<div class="col-md-12">
<p id="abtus"> 
Welcome To <strong style="font-size:28px; margin-top:100px">HOME CASINO LTD.</strong>

Founded in 2019 HOME CASINO LTD. Play all your favorite online casino games at HOMECASINO.COM Our software is always the best. Get started now with a $40 Welcome Bonus and a free download!NetBet Casino is the best place to find every kind of online casino game from slots and jackpots to card and table games. Find an old favourite or make new GAME</p>
</div>
</div>

 <div class="col-md-4 ">
<a href="headtail.php"><img src="images/118s-l1600.jpg" style="width:400px;"class="fsty fsty1" /></a>
<h3 align="center">Head Tails   </h3>
</div>

<div class="col-md-4 ">
<a href="stonepaper.php"><img src="images/255img.jpg" style="width:400px;"class="fsty fsty1" /></a>
<h3 align="center">Stone Paper Scissor</h3>
</div>
<div class="col-md-4 ">
<a href="updown.php"><img src="images/289img2.jpg" style="width:400px;" class="fsty fsty1" /></a>
<h3 align="center">7UP-7DOWN    </h3>
</div>

<div class="col-md-12" style="font-size:24px;margin-top:20px">
Latest-Games coming soon!
<br />
<br />
</div>


<div class="col-md-2">
<img src="images/80img.jpg" style="width:200px;" class="fsty1" />
</div>

<div class="col-md-2">
<img src="images/95img2.jpg" style="width:200px;"  class="fsty1"  />
</div>
<div class="col-md-2">
<img src="images/118s-l1600.jpg" style="width:200px;" class="fsty1"  />
</div>
<div class="col-md-2">
<img src="images/134img.jpg"style="width:200px;"  class="fsty1"  />
</div>
<div class="col-md-2">
<img src="images/198img2.jpg" style="width:200px;" class="fsty1"  />
</div>


<div class="col-md-12" style="font-size:24px;margin-top:20px">
Testimonials
<br />
<br />

</div>


<div class="section-06">
<div class="col-md-1">
</div>
<div class="col-md-10 bord ">


"A casino is a facility which houses and accommodates certain types of gambling activities. The industry that deals in casinos is called the gaming industry. Casinos are most commonly built near or combined with hotels, restaurants, retail shopping, cruise ships or other tourist attractions.  You've got a repeat customer here."
</div>
<div class="col-md-1">
</div>
</div>
</div>


<div class="section_07 bggg">
<div class="col-md-2">

<h3>Contact Details</h3>

 <p id="contact">    1/472 Malviya Nagar ,Jaipur,JP ,302017
     917-330-4832, Fax Number:- 212-730-7160
     talktovk14@gmail.com</p>


</div>
<div class="col-md-8">
</div>
<div class="col-md-2">

<h3>Navigation</h3>

  <p>  Home<br />
    Products<br />
    About Us<br />
    Contact Us
</p>

</div>
<div class="col-md-12" style="margin-top:20px; text-align:center; font-size:16px ">
Front End Developer : Vishal Khandelwal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Back End Developer : Vaibhav As VD</font><br>
&copy;All rights Reserved | HOME CASINO LTD. <?php echo date('Y'); ?>
</div>



</body>
</html>
