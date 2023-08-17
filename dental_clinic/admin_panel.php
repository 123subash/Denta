<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Board <?php echo $_SESSION['username']  ?></title>
    <link rel="stylesheet" href="./backend_css_file/admin_panel.css?v=<?php echo time(); ?>">

</head>

<body>
    <div class="main-bar">
        <div class="side-bar">
            <img src="All _Photos/logo's_crop.jpg" alt="">
            <a href="dashboard/dashboard.php">Dashboard</a>
            <a href="users/users.php">Users</a>
            <a href="calender/calender.php">Calender</a>
            <a href="appointed/appoinment.php">Appointment</a>
            <a href="feedback/feedback.php">Feedback</a>
        </div>
        <div class="content-bar">
            <h1>Here will be main content</h1>
            <h4>And so on dolor s
                it amet consectetur adipisicing
                elit. Sit, eligendi.
            </h4>
        </div>
        <a href="logout.php">
            <button>LOG OUT</button>
        </a>

    </div>
</body>

</html>