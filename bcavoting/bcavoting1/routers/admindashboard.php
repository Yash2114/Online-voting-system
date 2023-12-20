<?php
session_start();
include('../api/connect.php');

if (!isset($_SESSION['admin_data'])) {
  header("location:../");
}

$admin_data = $_SESSION['admin_data'];

?>



<html>

<head>
  <link rel="stylesheet" href="../css/style3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <nav>
    <div class="left">ONLINE VOTING PORTAL</div>
    <div class="right">
      <ul>
        <li>
          <a id="display-voters" onclick="displayVotersPage()" style="cursor:pointer;">Voters</a>
          <a id="display-candidates" onclick="displayCandidatesPage()"
            style="cursor:pointer;display:none;">Candidates</a>
        </li>
        <li> <a href="logout.php"> LogOut</a></li>
      </ul>
    </div>
  </nav>

  <hr>
  <!-- Displaying admin data -->
  <div class="main-left">
    <div id="profile" >
      <img class="user" src="../img/user3.png" ><br>
      <b class="text">Name:</b>
      <?php echo $admin_data['fname'] ?> <br><br>
      <b class="text">Email:</b>
      <?php echo $admin_data['email'] ?> <br><br>
    </div>
  </div>

  <div class="main-right" >

    <!-- Candidates page displayed using css and javascript -->
    <div id="candidates-page">
      <div id="group" >
        <?php
        $get_candidates = mysqli_query($connect, "SELECT * FROM candidates");
        $candidates_data = mysqli_fetch_all($get_candidates, MYSQLI_ASSOC);
        if ($candidates_data) {
          for ($i = 0; $i < count($candidates_data); $i++) {
            ?>
            <div class="card">
              <img class="i1"  src="../<?php echo $candidates_data[$i]['image'] ?>"
                height="100" width="100">

              <div class="card-body" style="padding:5px; margin-left:2px;">
                <b>Candidate Name: </b>
                <?php echo $candidates_data[$i]['name'] ?> <br><br>
                <b>Position: </b>
                <?php echo $candidates_data[$i]['position'] ?> <br>
              </div><br>
              <div class="edit-candidate" style="margin-left:5px; font-size:20px;">
                <i class="fa-solid fa-user-pen" id="editButton" style="color:black;padding:12px;cursor:pointer;"
                  onclick="displayCandidateForm('update-candidate-form-<?php echo $candidates_data[$i]['id']; ?>')"></i>
                <a href="../api/deleteCandidate.php?id=<?php echo $candidates_data[$i]['id']; ?>"
                  onclick="return confirm('Are you sure you want to delete this candidate?');">
                  <i class="fa-solid fa-trash-can" style="color:black; padding:12px; cursor:pointer;"></i>
                </a>
              </div>

              <!-- Update candidate form -->
              <form action="../api/updateCandidate.php" method="POST"
                id="update-candidate-form-<?php echo $candidates_data[$i]['id']; ?>" style="display:none;">
                <div class="update-candidate" style="float:right;margin-top:-11%">
                  <div class="card-input">
                    <label>Candidate Name:</label>
                    <input type="text" name="name" id="name" placeholder="<?php echo $candidates_data[$i]['name'] ?>"
                      required><br>
                    <label>Candidate Position:</label>
                    <input type="text" name="position" id="position"
                      placeholder="<?php echo $candidates_data[$i]['position'] ?>" required>
                    <br>
                    <input name="id" type="number" hidden value="<?php echo $candidates_data[$i]['id'] ?>">
                    <button id="updatebutton" type="submit">update</button>
                    <button id="closeButton" type="button"
                      onclick="hideCandidateForm('update-candidate-form-<?php echo $candidates_data[$i]['id']; ?>')">close</button>
                    <br><br>
                  </div>
                </div>
              </form>

            </div><br><br>

            <?php
          }

        } ?>
        <div id="add-candidate-button-div">
          <i class="fa-solid fa-plus" style="color:red; font-size:30px; cursor:pointer; margin:5px;"
            onclick="addCandidateHide()"></i><br><span style="font-size:15px;">Add Candidate</span>
        </div>

        <form action="../api/createCandidate.php" method="POST" id="add-candidate-form" style="display:none;">
          <div class="card">
            <img class="i1" style="padding: 3px; margin-left: 16px;" src="../img/user.png" height="100" width="100">
            <div class="card-body" style="margin-left:18px; margin-top:10px; ">
              <label>Candidate Name:</label>
              <input type="text" name="name" id="name" placeholder="Enter Candidate Name" required><br>
              <label>Candidate Position:</label>
              <input type="text" name="position" id="position" placeholder="Enter Candidate Position" required>
              <br>
              <label>Candidate Image name with format:</label>
              <input type="text" name="image" id="image" placeholder="photo.png" required><br>
              <button id="updatebutton" type="submit">Add Candidate</button>
              <button id="closeButton" type="button" onclick="addCandidateDisplay()">close</button>
              <br><br>
            </div>
          </div><br>
        </form>
      </div>
    </div>

    <!-- Voters page displayed using css and javascript -->
    <div id="voters-page" style="display:none;">
      <div id="group" style="margin:15px 22px 0 0; width:100%">
        <?php include('../api/displayVoters.php'); ?>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
      integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      function displayVotersPage() {
        displayCandidateForm('voters-page');
        hideCandidateForm('candidates-page');
        displayCandidateForm('display-candidates');
        hideCandidateForm('display-voters');
      }
      function displayCandidatesPage() {
        displayCandidateForm('candidates-page');
        hideCandidateForm('voters-page');
        hideCandidateForm('display-candidates');
        displayCandidateForm('display-voters');
      }
      function addCandidateHide() {
        displayCandidateForm('add-candidate-form');
        hideCandidateForm('add-candidate-button-div');
      }
      function addCandidateDisplay() {
        hideCandidateForm('add-candidate-form');
        displayCandidateForm('add-candidate-button-div');
      }
      function displayCandidateForm(formid) {
        document.getElementById(formid).style.display = 'block';
      };
      function hideCandidateForm(formid) {
        document.getElementById(formid).style.display = 'none';
      };
    </script>
</body>

</html>