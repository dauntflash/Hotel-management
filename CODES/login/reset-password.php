<?php
require_once "connection.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST["repeat_password"];
  
  $errors = array();

  if(empty($email) || empty($password) || empty($passwordRepeat)){
    array_push($errors, "Please fill out all fields.");
  }
  else{
    if ($password !== $passwordRepeat){
      array_push($errors, "Password does not match");
    }

    if (count($errors) == 0) {
      $sql = "SELECT * FROM login WHERE email='$email'";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0){
        $new_password = password_hash($password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE login SET password='$new_password' WHERE email='$email'";

        if(mysqli_query($conn, $update_sql)){
          echo "Password reset successfully!";
        }
        else{
          echo "Error updating password: " . mysqli_error($conn);
        }
      }
      else{
        array_push($errors, "Email not found in database.");
      }
    }

    if (count($errors) > 0) {
      foreach ($errors as $error) {
        echo "<div style='color: red;'>$error</div>";
      }
    }

    mysqli_close($conn);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Password Reset</title>
</head>
<body>
  <h1>Password Reset</h1>
  <form method="post" action="reset-password.php">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>
    <label for="password">New Password:</label>
    <input type="password" name="password" required><br><br>
    <label for="password">Confirm New Password:</label>
    <input type="password" name="repeat_password" required><br><br>
    <input type="submit" value="Reset Password">
  </form>
</body>
</html>
