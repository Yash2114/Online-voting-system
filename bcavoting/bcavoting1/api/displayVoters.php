<?php
include_once("connect.php");
$selectAll="SELECT * FROM students ORDER BY fname DESC";
$record = $connect->query($selectAll);

$table='';
    if($record->num_rows>0){
         while ($row = mysqli_fetch_array($record)) {
            // Convert status to a human-readable string
        $status = ($row['status'] == 1) ? 'Voted' : 'Not Voted';
        $table.= '  
            <div class="card-body" style="margin-left:18px; margin-top:10px; border:solid 1px; padding:10px; display:flex; justify-content:space-between; align-items:center;">
              <b>Candidate Name : <span> ' . $row['fname'] .' '. $row['lname'].'</span> </b>
              <b>Vote Status : <span> ' . $status . ' </span> </b>
    </div> 
';
}
}
echo $table;        
?>