<?php
include_once("connect.php");
//Add data
if(isset($_POST["name"])){
    $candidate_name=$connect->real_escape_string($_POST['name']);
    $candidate_photo=$connect->real_escape_string($_POST['image']);
    $candidate_position=$connect->real_escape_string($_POST['position']);
    if($candidate_name!=''&& $candidate_position!='' && $candidate_photo){
    $candidate_photo = 'img/'.$candidate_photo;
    $sql = "INSERT INTO `candidates` (`name`,`position`,`image`) VALUES ('$candidate_name', '$candidate_position','$candidate_photo')";
    $table = $connect->query($sql);
    if($table){
        echo '<script>
        alert("Candidate added !!");
        window.location="../routers/admindashboard.php";
      </script>';
    }else{
        echo '
        <script>
        alert(" Not able to add Candidate!!");
        window.location="../routers/admindashboard.php";
      </script>';
    }
}
}else{
    echo '
        <script>
        alert(" No data found for Candidate!!");
        window.location="../routers/admindashboard.php";
      </script>';
}

?>