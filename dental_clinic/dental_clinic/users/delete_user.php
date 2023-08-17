<?php
include('../database_conn.php');

if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    $sql = "DELETE FROM `appointment_details` WHERE `id`='$user_id'";

    $result = $conn->query($sql);
     
    if($result == TRUE){
        
        echo"Record deleted";
        header('location:users.php');

    }else{
        // echo"Error".$sql. "<br>". $conn->error;
    }
}
?>