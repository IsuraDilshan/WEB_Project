<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["tourist"]) || $_SESSION["tourist"] !== true){
    header("location: login.php");
    exit;
}
$uname = $_SESSION["uname"];
$dID = $_SESSION["dID"];
?>