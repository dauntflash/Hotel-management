<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "loginsystem";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (mysqli_query($conn, $sql)) {

} else {
    die("Error creating database: " . mysqli_error($conn));
}

mysqli_select_db($conn, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS login (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (mysqli_query($conn, $sql)) {
} else {
    die("Error creating table: " . mysqli_error($conn));
}
?>


