<?php
$dbServername = "localhost";
$dbUsername = "bluejjay";
$dbPassword = "roadrunners";
$dbName = "users_tc";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

?>
