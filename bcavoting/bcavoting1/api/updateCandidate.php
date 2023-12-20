<?php
include_once("connect.php");
//update data
if(isset($_POST["id"])){
    $candidate_id=$connect->real_escape_string($_POST['id']);
    $name=$connect->real_escape_string($_POST['name']);
    $position=$connect->real_escape_string($_POST['position']);
    if($name!=''&& $position!=''){
    $edit="UPDATE `candidates` SET `name`='$name',`position`='$position' WHERE id=$candidate_id";
    $result=$connect->query($edit);
    if($result){
        echo '<script>
        alert("Updated Candidate!!");
        window.location="../routers/admindashboard.php";
      </script>';
    }else{
        echo '
        <script>
        alert(" Data not updated!!");
        window.location="../routers/admindashboard.php";
      </script>';
    }
}
}else{
    echo '
        <script>
        alert(" No user found!!");
        window.location="../routers/admindashboard.php";
      </script>';
}

?>