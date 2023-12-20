<?php
session_start();
include('connect.php');


$votes=$_POST['gvotes'];
$total_votes=$votes+1;
$gid=$_POST['gid'];
$uid=$_SESSION['userdata']['id'];

$update_votes=mysqli_query($connect,"UPDATE students SET votes='$total_votes' WHERE id='$gid'");
$update_user_status=mysqli_query($connect,"UPDATE students SET status=1 WHERE id='$uid'");

if($update_votes and $update_user_status){
    $groups=mysqli_query($connect,"SELECT id,fname,lname,votes FROM candidate");
    $groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);

    $_SESSION['userdata']['status']=1;
    $_SESSION['groupcsdata']=$groupsdata;

    echo'
    <script>
    alert("Voting successfully");
    window.location = "../routers/dashboard.php";
    </script>
    ';

}
else{
    echo'
    <script>
    alert("Some error occured !");
    window.location = "../routers/dashboard.php";
    </script>
    ';
}

?>