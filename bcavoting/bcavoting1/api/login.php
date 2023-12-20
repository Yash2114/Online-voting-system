<?php

session_start();
include("connect.php");

$number=$_POST['number'];
$password=$_POST['password'];


$check_user=mysqli_query($connect,"SELECT * FROM students WHERE mobile='$number' AND password='$password' " );
$get_candidates=mysqli_query($connect,"SELECT * FROM candidates");

if(mysqli_num_rows($check_user)>0){
    $userdata=mysqli_fetch_array($check_user);
    $candidatesdata=mysqli_fetch_all($get_candidates,MYSQLI_ASSOC);

    $_SESSION['userdata']=$userdata;
    $_SESSION['candidatesdata']=$candidatesdata;

    echo '
    <script>
   
    window.location="../routers/dashboard.php";
  </script>';
}
else{
    echo '
    <script>
    alert(" User not found!!");
    window.location="../routers/login.html";
  </script>';
}
?>