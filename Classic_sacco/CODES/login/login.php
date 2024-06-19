<?
session_start();
if (isset($_SESSION["user"]='index.html')){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<div id="frm">
<?php
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    require_once "connection.php";
    $sql = "SELECT * FROM login WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["username"] = $username;
            header("location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }         
    } else {
        echo "<div class='alert alert-danger'>Username does not exist</div>";
    }
}
?>
        <h1>Login</h1>
        <form action="login.php" onsubmit  method="post"  name="f1">
            <p>Please fill in your credentials to login.</p>
            <p><input type="email" placeholder="Enter email" id="user" name="email" />
            <label>Email</label></p>
            <p> <input type="password" placeholder="Enter Password" id="pass" name="password" />
            <label>Password</label></p>
            <p><input type="submit" name="login" id="btn" value="login" /></p>
            <p>Don't have an account? <a href="signup.php">Signup</a></div></p>  
</div>  

</form>  
</body>
</html>
