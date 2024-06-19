<?php
require_once "connection.php";
// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  // Collect form data
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST["repeat_password"];
  
  // Validate form data
  if(empty($email) || empty($password)|| empty($passwordRepeat)){
    echo "Please fill out all fields.";
  }
  else{
    // Connect to database
    
    
    // Check if email exists in database
    $sql = "SELECT * FROM login WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
      // Update password in database
      $new_password = password_hash($password, PASSWORD_DEFAULT);

      if ($password!==$passwordRepeat){
        array_push($errors,"Password does not match");
    }
      $update_sql = "UPDATE login SET password='$new_password' WHERE email='$email'";
      
      if(mysqli_query($conn, $update_sql)){
        echo "Password reset successfully!";
      }
      else{
        echo "Error updating password: " . mysqli_error($conn);
      }
    }
    else{
      echo "Email not found in database.";
    }
    
    // Close database connection
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
