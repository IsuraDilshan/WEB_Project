<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["tourist"]) || $_SESSION["tourist"] !== true){
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
    <title>Tourist Dashboard</title>
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

    <br>

    <center>
        
        <button onclick="guide()" class="btn" id="g">Our Guides</button>
        <button onclick="driver()" class="btn" id="d">Our Drivers</button>
        <button onclick="book()" class="btn" id="b">Your Bookings</button>

        <br><br><br>
        
        <div id="guides">
            
            <?php
                $servername = "localhost";
                $username = "id15181466_trapotourdb";
                $password = "NSBMply20.1SE";
                $dbname = "id15181466_trapotourdatabase";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = 'SELECT * from guides;';
                if (mysqli_query($conn, $sql)) {
                echo "";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $count=1;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="card" style="width: 18rem; float: left;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-left: 20px; margin-bottom: 20px;">
                        <div class="card-body">
                          <h5 class="card-title">Guide ID : <lable style="color:red;"><?php echo $row['guideID']; ?></lable></h5>
                          <h5 class="card-title"><?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?></h5>
                          <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['city']; ?></h6>
                          <h6 class="card-subtitle mb-2 text-muted">Gender : <?php echo $row['gender']; ?></h6>
                          <p class="card-text"><?php echo $row['mobile']; ?></p>
                          <p class="card-text"><?php echo $row['email']; ?></p>
                          <a href="#" class="card-link" id="crdbtn" onclick="book()">Book Now</a>
                        </div>
                    </div>
            <?php
            $count++;
            }
            } else {
            echo '0 results';
            }
            ?>

        </div>

        <div id="drivers">
                
            <?php
                $servername = "localhost";
                $username = "id15181466_trapotourdb";
                $password = "NSBMply20.1SE";
                $dbname = "id15181466_trapotourdatabase";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = 'SELECT * from drivers;';
                if (mysqli_query($conn, $sql)) {
                echo "";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $count=1;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) { ?>

                    <div class="card" style="width: 18rem; float: left;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-left: 20px; margin-bottom: 20px;">
                        <div class="card-body">
                          <h5 class="card-title">Driver ID : <lable style="color:red;"><?php echo $row['driverID']; ?></lable></h5>
                          <h5 class="card-title"><?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?></h5>
                          <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['city']; ?></h6>
                          <h6 class="card-subtitle mb-2 text-muted">Gender : <?php echo $row['gender']; ?></h6>
                          <p class="card-text"><?php echo $row['mobile']; ?></p>
                          <p class="card-text"><?php echo $row['email']; ?></p>
                          <a href="#" class="card-link" id="crdbtn" onclick="book()">Book Now</a>
                        </div>
                    </div>

            <?php
            $count++;
            }
            } else {
            echo '0 results';
            }
            ?>

        </div>

        <div id="bookings">
            <label style=" font-size: 30px; font-weight: 700;">NOT AVAILABLE YET</label>
        </div>

    </center>
    
    <script>

        var g = document.getElementById("guides");
        g.style.display = "none";
        var d = document.getElementById("drivers");
        d.style.display = "none";
        var b = document.getElementById("bookings");
        b.style.display = "none";
        
        function resetColor(){
            document.getElementById("g").style.backgroundColor="rgba(255, 255, 255, 0.4)";
            document.getElementById("d").style.backgroundColor="rgba(255, 255, 255, 0.4)";
            document.getElementById("b").style.backgroundColor="rgba(255, 255, 255, 0.4)";
        }
        function guide() {
            resetColor();
            g.style.display = "block";
            d.style.display = "none";
            b.style.display = "none";
            document.getElementById("g").style.backgroundColor="rgb(255, 255, 255)";
        }
        function driver() {
            resetColor();
            g.style.display = "none";
            d.style.display = "block";
            b.style.display = "none";
            document.getElementById("d").style.backgroundColor="rgb(255, 255, 255)";
        }
        function book() {
            resetColor();
            g.style.display = "none";
            d.style.display = "none";
            b.style.display = "block";
            document.getElementById("b").style.backgroundColor="rgb(255, 255, 255)";
        }
        
    </script>

</body>
</html>