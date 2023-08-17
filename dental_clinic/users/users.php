<?php 

include('../database_conn.php');

$sql = "SELECT * FROM appointment_details";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../backend_css_file/admin_panel.css?v=<?php echo time(); ?>">

<body>
<div class="main-bar">
        <div class="side-bar">
            <img src="All _Photos/logo's_crop.jpg" alt=""> 
            <a href="/dental_clinic/dashboard/dashboard.php">Dashboard</a>
            <a href="/dental_clinic/users/users.php">Users</a>
            <a href="/dental_clinic/calender/calender.php">Calender</a>
            <a href="/dental_clinic/appointed/appoinment.php">Appointment</a>
            <a href="/dental_clinic/feedback/feedback.php">Feedback</a>
        </div>
        <div class="content-bar">
        <div class="users">
    <table border="0" cellspacing="10" style="width: 400px;">
        <thead>
        <tr>
           <th>ID</th>
           <th>Email</th>
           <th>Password</th>
           <th>Action</th>
        </tr>
        <!-- <tr>
            <td>101</td>
            <td>1st@gmail.com</td>
            <td>first</td>
        </tr> -->
        </thead>
        <tbody>
            <?php 
            if($result->num_rows >0){
            
                while($row = $result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><a  href="edit_user.php?id=<?php echo $row['id'] ?>">Edit</a>
                        &nbsp;<a  href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                    </tr>
            <?php   }
            }
            ?>
        </tbody>
    </table>
    </div>
        </div>
        <a href="logout.php">
            <button>LOG OUT</button>
        </a>

    </div>
</body>
</html>