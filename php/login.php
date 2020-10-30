<?php
$message="";
$isTourist = "false";
$isGuide = "false";
$isDriver = "false";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","sriarana_trapo","NSBMply20.1SE","sriarana_trapotour");

	//is tourist?
	$result = mysqli_query($conn,"SELECT * FROM tourists WHERE username='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) 
	{
			//is guide?
			$result = mysqli_query($conn,"SELECT * FROM guides WHERE username='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'");
			$count  = mysqli_num_rows($result);
			if($count==0) 
			{
					//is driver?
					$result = mysqli_query($conn,"SELECT * FROM drivers WHERE username='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'");
					$count  = mysqli_num_rows($result);
					if($count==0) 
					{
						echo '<script>alert("Wrong Usarname or Password")</script>';
					} 
					else 
					{
						$isDriver = "true";
					}
			} 
			else 
			{
				$isGuide = "true";
			}
	} 
	else 
	{
		$isTourist = "true";
	}
}

	if($isTourist=="true")
	{
		session_start();
		$_SESSION["tourist"] = true;
		$_SESSION["uname"] = $_POST["userName"];	
		header("Location: tourist_logged.php");
	}
	else if($isGuide=="true")
	{
		session_start();
		$_SESSION["guide"] = true;
		$_SESSION["uname"] = $_POST["userName"];	
		header("Location: guide_logged.php");
	}
	else if($isDriver=="true")
	{
		session_start();
		$_SESSION["driver"] = true;
		$_SESSION["uname"] = $_POST["userName"];	
		header("Location: driver_logged.php");
	}
	else
	{
		
	}

?>
<html>
<head>
<title>Login</title>
<link rel="icon" href="images/icon.ico">
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<form name="frmUser" method="post" action="">
	<div class="message"><?php if($message!="") { echo $message; } ?></div>
		<table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
			<tr class="tableheader">
				<td align="center" colspan="2">Login</td>
			</tr>
			<tr class="tablerow">
			<td>
				<input type="text" name="userName" placeholder="User Name" class="login-input" required></td>
			</tr>
			<tr class="tablerow">
			<td>
				<input type="password" name="password" placeholder="Password" class="login-input" required></td>
			</tr>
			<tr class="tableheader">
				<td align="center" colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
			</tr>
		</table>
</form>
<center>
	<div id="bDiv">
		<lable id="lbl">Have not an account?</lable><br><br>
		<button onclick="document.location='tourist_signup.php'" class="btn">I'm a tourist</button>
		<button onclick="document.location='guide_signup.php'" class="btn" style="margin-left:20px;margin-right:20px;">I'm a guide</button>
		<button onclick="document.location='driver_signup.php'" class="btn">I'm a driver</button>
	</div>
</center>
</body></html>