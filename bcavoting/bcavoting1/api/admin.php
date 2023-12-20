<?php

session_start();
include("connect.php");

$email=$_POST['email'];
$password=$_POST['password'];


$check_admin=mysqli_query($connect,"SELECT * FROM admins WHERE email='$email' AND password='$password' " );

if(mysqli_num_rows($check_admin)>0){
    $admin_data=mysqli_fetch_array($check_admin);
    $_SESSION['admin_data']=$admin_data;
    echo '
    <script>
    window.location="../routers/admindashboard.php";
  </script>';
}
else{
    echo '
    <script>
    alert(" User not found!!");
    window.location="../routers/adminlogin.html";
  </script>';
}
?>