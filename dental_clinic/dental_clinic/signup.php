<?php
//To show the alert
$succes = false;
$err = false;
$usererr = $passerr= $cpasserr="";
$username = $password= $cpassword="";

//To connect with database 
include 'database_conn.php';

//To take input from user in post method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["username"])) {
    $usererr = "*Username required";
  } else {
    $username =input($_POST["username"]);
  }
  if (empty($_POST["password"])) {
    $passerr = "*Password required";
  } else {
    $password = input($_POST["password"]);
  }
  if (empty($_POST["cpassword"])) {
    $cpasserr = "*Confirm Password required";
  } else {
    $cpassword = input($_POST["cpassword"]);
  }

  //To check wether username exist or not
  $checkExists = "Select * From `appointment_details` where username='$username'";
  $result = mysqli_query($conn, $checkExists);
  $checkExistsRows = mysqli_num_rows($result);

  //if username does already exist show this alert
  if ($checkExistsRows > 0) {
    $err = "Username Already Exists";
  }
  //if not run this query 
  else {
      if($usererr==""&& $passerr =="" && $cpasserr==""){
        if($password==$cpassword ){

      $sql = "INSERT INTO `appointment_details` (`username`, `password`, `logged_date`) VALUES ( '$username', '$password', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      
  
      //if account is created then show this alert
      if ($result) {
        header('location:login.php');
        //$succes = true;
      } 
    }
    
    else{
        echo "Password does not match";
      }
    }
    // if password does not match show this alert
    else {
      $err = "Fill the field";
    }
  }
}
function input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>SignUp Form</title>
  <link rel="stylesheet" type="text/css" href="backend_css_file/login_signup.css">
</head>

<body>

<?php
  if ($succes) {
    echo '<div class="alert_success"> <strong>Success!</strong> Account is created.</div>';
  }
  if ($err) {
    echo '
    <div class="alert_danger"> <strong>Error!</strong> ' . $err . ' </div>';
  }
  ?>
  <div class="container">
    <h2>SignUp Form</h2>
    <form action="/dental_clinic/signup.php" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username"><br>
        <span class="error" style="color: red;">
          <?php echo $usererr ?>
        </span>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password"><br>
        <span class="error" style="color: red;">
          <?php echo $passerr ?>
        </span>
      </div>
      <div class="form-group">
        <label for="cpassword">Confirm Password</label>
        <input type="password" id="cpassword" name="cpassword"><br>
        <span class="error" style="color: red;">
          <?php echo $cpasserr ?>
        </span>
      </div>

      <div class="forget_password">
        <a href="#">Forget Password</a>
      </div>
      <button type="submit">SignUp</button>
    </form>
  </div>
</body>
</html>