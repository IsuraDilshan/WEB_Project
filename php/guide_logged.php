<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["guide"]) || $_SESSION["guide"] !== true){
    header("location: login.php");
    exit;
}
$uname = $_SESSION["uname"];
?>