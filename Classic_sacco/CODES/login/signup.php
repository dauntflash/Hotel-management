<?php
session_start();
   if (isset($_SESSION["user"])){
    header("Location: index.php");
   }
            ?>
<html>
    <head>
        <title>signup</title>
        <link rel = "stylesheet" type = "text/css" href = "style1.css">
    </head>
    <body>
    <div id="frm">
        <?php
         require_once "connection.php";
        if (isset($_POST["submit"])){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors= array();
            //validate password strength
            $uppercase =preg_match('@[A-Z]@',$password);
            $lowercase =preg_match('@[a-z]@',$password);
            $number =preg_match('@[0-9]@',$password);
            $specialchars =preg_match('@[^\w]@',$password);


            if (empty($username) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
                array_push($errors,"All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors,"Email is not valid");
                }
            if (strlen($password)<8){
                array_push($errors,"password must be atleast 8 characters long");
            }
            if ($password!==$passwordRepeat){
                array_push($errors,"Password does not match");
            }
            if (!$uppercase||!$lowercase||!$number||!$specialchars){
                array_push($errors,"Password not strong");
            }

           
            $sql = "SELECT * FROM login WHERE email='$email'";
            $result=mysqli_query($conn,$sql);
            $rowcount = mysqli_num_rows($result);
            if ($rowcount>0){
                array_push($errors,"Email already exists!");
            }
            if (count($errors)>0) {
                foreach($errors as $error){
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }      
             else{
                //insert the data into the database
                $sql = "INSERT INTO login (username, email, password) VALUES ( ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt =mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt){
                    mysqli_stmt_bind_param($stmt,"sss",$username, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>successfully registered</div>";
                }else{
                    die("Something went wrong");
                }
                    }
                    }
        ?>
        
       <form action="signup.php" method="POST">
       <h2>Register now</h2>
       <div class="input_box">
       <p><input type="text" name="username" placeholder="Enter your name">
       <label>Username</label></p>
       <p><input type="text" name="email" placeholder="Enter your email">
       <label>Email</label></p>
       <p><input type="password" name="password" placeholder="Enter your password">
       <label>Password</label></p>
       <p><input type="password" name="repeat_password" placeholder="confirm your password">
       <label>Confirm Password</label>
       </div></p>
       <input type="submit" name="submit" value="Register now" id="btn">
       <p>Already have an account? <a href="login.php">login now</a></p>
    </form>
       </div>
    </body>
</html>