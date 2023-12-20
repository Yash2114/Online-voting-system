<?php
session_start();
if (!isset($_SESSION['userdata'])) {
  header("location:../");
}

$userdata = $_SESSION['userdata'];
$candidatesdata = $_SESSION['candidatesdata'];

if ($_SESSION['userdata']['status'] == 0) {
  $status = '<b style="color:red">Not Voted</b>';
} else {
  $status = '<b style="color:green">voted</b>';
}
?>



<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style2.css">

</head>


<body>

  <nav>
    <div class="left">ONLINE VOTING PORTAL</div>
    <div class="right">
      <ul>
        <li> <a href="../">Home</a></li>
        <li> <a href="../api/results.php">Result</a></li>
        <li> <a href="logout.php"> LogOut</a></li>

      </ul>
    </div>


  </nav>


  <hr>
  
  <div class="main-left">
    <div id="profile">

      <img class="user" src="../img/user3.png" height="200" width="200"><br>
      <b class="text">Name:</b>
      <?php echo $userdata['fname'] ?> <br><br>
      <b class="text">Surname:</b>
      <?php echo $userdata['lname'] ?> <br><br>
      <b class="text">Email:</b>
      <?php echo $userdata['email'] ?> <br><br>

      <b class="text">Mobile:</b>
      <?php echo $userdata['mobile'] ?><br><br>
      <!-- <b>Status:</b>  <?php echo $userdata['status'] ?><br><br> -->
    </div>


  </div>

  <div class="main-right">
    <div id="group">
      <?php
      if ($_SESSION['candidatesdata']) {
        for ($i = 0; $i < count($candidatesdata); $i++) {
          ?>
          <div class="card">
            <img class="i1" style="padding: 3px; margin-left: 16px;" src="../<?php echo $candidatesdata[$i]['image'] ?>"
              height="100" width="100">

            <div class="card-body">
              <h5 class="card-title">
                <b>Candidate Name: </b>
                <?php echo $candidatesdata[$i]['name'] ?> <br><br>
              </h5>
              <b>Votes: </b>
              <!-- <?php echo $candidatesdata[$i]['votes'] ?> <br> -->
              <form action="../api/vote.php" method="POST">
                <!-- <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                      <input type="hidden" name="gid" value=" <?php echo $groupsdata[$i]['id'] ?>" > -->
                <?php
                if ($_SESSION['userdata']['status'] == 0) {
                  ?>
                  <input type="submit" class="btn btn-primary" name="votebtn" value="vote" id="votebtn">
                  <?php
                } else {
                  ?>
                  <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                  <?php

                }

                ?>
              </form> <br><br>

            </div><br>
          </div><br><br>
          

          <?php
        }

      } else {

      } ?>
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>

</html>