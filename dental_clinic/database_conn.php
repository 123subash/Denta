<?php 
$server="localhost";
$username="root";
$password="";
$database="clinic_data";

$conn = new mysqli($server, $username, $password,$database);
if(!$conn){
    die('err'.mysqli_connect_error());
}
// else{
//     echo"success";
// }
?>