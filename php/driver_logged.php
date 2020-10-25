<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["driver"]) || $_SESSION["driver"] !== true){
    header("location: login.php");
    exit;
}
$uname = $_SESSION["uname"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
    <link rel="icon" href="images/icon.ico">
    <link rel="stylesheet" type="text/css" href="db.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div id="topDiv">
        <div id="logo" onmouseover="status()">
            <a href="" target="_blank"><img src="images/logo.png" id="logo"></a>
        </div>
        <div id="user">
            <div id="username">
                Logged as: <?php echo $uname; ?>
            </div>
            <button id="logout" onclick="document.location='logout_user.php'">
                LogOut
            </button>
        </div>
    </div>

    <center>
        
        <button onclick="requests()" class="btn" id="r">Requests</button>
        <button onclick="conformed()" class="btn" id="c">Conformed</button>

        <br><br><br>
        
        <div id="req">
            <label style=" font-size: 30px; font-weight: 700;">NOT AVAILABLE YET</label>
        </div>

        <div id="con">
            <label style=" font-size: 30px; font-weight: 700;">NOT AVAILABLE YET</label>
        </div>

    </center>
    
    <script>

        var r = document.getElementById("req");
        r.style.display = "none";
        var c = document.getElementById("con");
        c.style.display = "none";
        
        function resetColor(){
            document.getElementById("r").style.backgroundColor="rgba(255, 255, 255, 0.4)";
            document.getElementById("c").style.backgroundColor="rgba(255, 255, 255, 0.4)";
        }
        function requests() {
            resetColor();
            r.style.display = "block";
            c.style.display = "none";
            document.getElementById("r").style.backgroundColor="rgb(255, 255, 255)";
        }
        function conformed() {
            resetColor();
            r.style.display = "none";
            c.style.display = "block";
            document.getElementById("c").style.backgroundColor="rgb(255, 255, 255)";
        }
        
    </script>

</body>
</html>