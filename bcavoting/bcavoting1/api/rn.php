<?php

include("connect.php");


$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

$checkUserQuery = "SELECT * FROM students WHERE fname = '$fname' AND lname = '$lname'";
$result = mysqli_query($connect, $checkUserQuery);

if ($result) {
  // Check if any rows were returned by the query
  if (mysqli_num_rows($result) > 0) {
      // User with the given first name and last name exists
      echo '
      <script>
        alert(" User with this name already exists.");
        window.location="../routers/rn.html";
      </script>';
}
else{
if($password==$cpassword){
    $insert=mysqli_query($connect,"INSERT INTO students (fname,lname,dob,email,mobile,password)VALUES('$fname','$lname','$dob','$email','$mobile','$password')");
    if($insert){
        echo '
        <script>
          alert(" Registration Successfully");
          window.location="../routers/login.html";
        </script>';

    }
    else{
        echo '
        <script>
          alert(" something went wrong with entered details!");
          window.location="../routers/rn.html";
        </script>';

    }

}
else{
    echo '
    <script>
      alert("password and confirm password does not matching!");
      window.location="../routers/rn.html";
    </script>';
}
}
}else {
  // Query execution failed; handle the error
  echo '
        <script>
          alert("Error executing the query: ");
          window.location="../routers/rn.html";
        </script>';
}

?>