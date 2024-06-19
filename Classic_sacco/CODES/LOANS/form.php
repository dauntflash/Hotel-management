<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginsystem";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data


$application_date = $_POST['application_date'];
$currency= $_POST['currency'];
$annual_income = $_POST['annual_income'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$birth_date = $_POST['birth_date'];
$status = $_POST['status'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$loans = $_POST['loans'];

// Insert the form data into the database
$sql = "INSERT INTO trial2 (application_date, currency, annual_income, first_name, last_name, birth_date, status, email,
phone, address, loans) VALUES ('$application_date', '$currency', '$annual_income', '$first_name', 
'$last_name', '$birth_date', '$status', '$email', '$phone', '$address', '$loans')";

if (mysqli_query($conn, $sql)) {
    echo "Loan application submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>