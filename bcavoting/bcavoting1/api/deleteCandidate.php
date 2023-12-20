<?php 
include_once("connect.php");

//delete records
if(isset($_GET['id'])){
    $id=$_GET['id'];
    if(!empty($id) && is_numeric($id)){
    $query="DELETE FROM candidates WHERE id=$id";    
    $result=$connect->query($query);
    if($result){
        echo '<script>
        alert("Candidate Deleted!!");
        window.location="../routers/admindashboard.php";
      </script>';
    }else{
        echo '
        <script>
        alert("Not able to delete!!");
        window.location="../routers/admindashboard.php";
      </script>';
    }
}
}else{
    echo '
        <script>
        alert(" No candidate found!!");
        window.location="../routers/admindashboard.php";
      </script>';
}

?>