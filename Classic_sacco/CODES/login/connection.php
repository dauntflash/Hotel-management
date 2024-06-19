<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "root";
$dbName = "loginsystem";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
 if (!$conn){
    die("something went wrong!");
 }?>
 