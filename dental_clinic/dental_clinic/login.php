<?php
include'database_conn.php';
$logged = false; 
$err=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $username=$_POST["username"];
  $password=$_POST["password"];

    $sql ="Select * from appointment_details where username='$username'AND password='$password'";
    $result= mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);

    if($num == 1){
    $logged = true;
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['username'] = $username;
    header("location:admin_panel.php");
    }
  
  else{
    $err ="Invalid User";
  }
}
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="backend_css_file/login_signup.css">
</head>
<body>

<!-- <?php
  if($logged){
    echo '<div class="alert_success"> <strong>Thanks!</strong> You are Logged in.</div>';
  }
  if($err){
    echo '
    <div class="alert_danger"> <strong>Error!</strong> '.$err.' </div>';
}
?> -->
  <div class="container">
    <h2>Login Form</h2>
    <form action ="/dental_clinic/login.php" method="post">
      <div class="form-group">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username"  >
      </div>
      <div class="form-group">
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"  >
      </div>
     <div class="forget_password"> 
        <a href="#">Forget Password</a>
    </div>
      <button type="submit">Login</button>
      <div class="create_account">
        <p>Don't Have an Account <a href="signup.php" style="color:aqua;">Sign Up</a> Here</p>
    </div>
    </form>
  </div>
</body>
</html>
