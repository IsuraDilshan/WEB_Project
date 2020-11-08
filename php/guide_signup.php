
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
	<link rel="icon" href="images/icon.ico">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

* {
	margin:0;
	padding:0;
	box-sizing:border-box;
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	-webkit-font-smoothing:antialiased;
	-moz-font-smoothing:antialiased;
	-o-font-smoothing:antialiased;
	font-smoothing:antialiased;
	text-rendering:optimizeLegibility;
}

body {
	font-family:"Open Sans", Helvetica, Arial, sans-serif;
	font-weight:300;
	font-size: 12px;
	line-height:30px;
	color:#777;
	background-image: url('images/background.png');
    background-repeat: no-repeat;
    background-size: 100%;
    margin-top: 200px;
}

.container {
	max-width:400px;
	width:100%;
	margin:0 auto;
  position:relative;
  margin-top: -150px;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] { font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif; }

#contact {
	background:#F9F9F9;
	padding:25px;
	margin:50px 0;
}

#contact h3 {
	color: #0CF;
	display: block;
	font-size: 30px;
	font-weight: 400;
}

#contact h4 {
	margin:5px 0 15px;
	display:block;
	font-size:13px;
}

fieldset {
	border: medium none !important;
	margin: 0 0 10px;
	min-width: 100%;
	padding: 0;
	width: 100%;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
	width:100%;
	border:1px solid #CCC;
	background:#FFF;
	margin:0 0 5px;
	padding:10px;
}

#contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {
	-webkit-transition:border-color 0.3s ease-in-out;
	-moz-transition:border-color 0.3s ease-in-out;
	transition:border-color 0.3s ease-in-out;
	border:1px solid #AAA;
}

#contact textarea {
	height:100px;
	max-width:100%;
  resize:none;
}

#contact button[type="submit"] {
	cursor:pointer;
	width:100%;
	border:none;
	background:#0CF;
	color:#FFF;
	margin:0 0 5px;
	padding:10px;
	font-size:15px;
}

#contact button[type="submit"]:hover {
	background:#09C;
	-webkit-transition:background 0.3s ease-in-out;
	-moz-transition:background 0.3s ease-in-out;
	transition:background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }

#contact input:focus, #contact textarea:focus {
	outline:0;
	border:1px solid #999;
}
::-webkit-input-placeholder {
 color:#888;
}
:-moz-placeholder {
 color:#888;
}
::-moz-placeholder {
 color:#888;
}
:-ms-input-placeholder {
 color:#888;
}
#al{
 font-size: 13px;
 font-weight: 800px;
}
.hold{
    width: 350px;
    height: 40px;
    border: 1px solid rgb(206, 206, 206);
}

    </style>
</head>
<body>
    <div class="container">  
        <form id="contact" action="" method="post" enctype="multipart/form-data">
          <h3 style="margin-bottom: 10px;">Sign Up</h3>
          <fieldset>
            <input name="fname" placeholder="First Name" type="text" tabindex="1" required autofocus>
          </fieldset>
          <fieldset>
            <input name="lname" placeholder="Last Name" type="text" tabindex="2" required autofocus>
          </fieldset>
          <fieldset>
            <input name="username" placeholder="Username" type="text" tabindex="3" required autofocus>
          </fieldset>
          <fieldset>
            <input name="password" placeholder="   Password" type="password" tabindex="4" required autofocus class="hold">
          </fieldset>
            <lable>M</lable>
            <input type="radio" name="gender" value="M" tabindex="5" required ></fieldset>
            <lable>F</lable>
            <input type="radio" name="gender" value="F" tabindex="6" required ></fieldset>
          <fieldset>
            <input name="email" placeholder="Your Email Address" type="email" tabindex="7" required>
          </fieldset>
          <fieldset>
            <input name="mobile" placeholder="Your Phone Number" type="tel" tabindex="8" required>
          </fieldset>
          <fieldset>
            <input name="city" placeholder="Your City" type="text" tabindex="9" required autofocus>
          </fieldset>
          

          <label>Your Image</label>
          <input type="hidden" name="size" value="1000000">
  	    <div>
  	        <input type="file" name="file1" size="100" tabindex="10">
  	    </div>
          
          <br>

          <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
          </fieldset>
          <a href="login.php" id="al">Already have an account?</a>
        </form>
    </div>
</body>
<?php 
$message="";
if(count($_POST)>0) {


	
	$imgName= $_FILES["file1"]["name"];
	$imgType= $_FILES["file1"]["type"];
	$tmpName= $_FILES["file1"]["tmp_name"];
	$r=move_uploaded_file($tmpName,"user_images/$imgName");

	if($r)
	{
		$conn = mysqli_connect("localhost","sriarana_trapo","NSBMply20.1SE","sriarana_trapotour");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT INTO guides (image, firstName, lastName, username, password, gender, email, mobile, city) VALUES ('" . $imgName . "','" . $_POST["fname"] . "','" . $_POST["lname"] . "','" . $_POST["username"] . "','" . $_POST["password"] . "','" . $_POST["gender"] . "','" . $_POST["email"] . "','" . $_POST["mobile"] . "','" . $_POST["city"] . "')";
	
		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("New record created successfully")</script>';
		} 
		else {
			echo '<script>alert("Username already use or Something went wrong")</script>';
		}
		  
	}
	else
	{echo '<script>alert("Image not successfully uploaded")</script>';}



	$conn->close();
}
?>
</html>