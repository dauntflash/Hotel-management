<?php
session_start();
if (!isset($_SESSION["user"])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
<style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hello, <b><?php echo htmlspecialchars($_SESSION['email']); ?></b>. Welcome to Dashboard.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a><br>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>

    
</div>
</body>
</html>