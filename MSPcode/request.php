<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body id="reqbg">

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "expert_db";
    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
        die("Connection failed: " .  mysqli_connect_error());
    }

    //Create database if not exists
    $createDB = "CREATE DATABASE IF NOT EXISTS $dbName";
    mysqli_query($conn, $createDB);

    mysqli_close($conn);

    $conn = mysqli_connect($servername, $username, $password, $dbName);
    if (!$conn) {
        die("Connection failed: " .  mysqli_connect_error());
    }

    createTableTraining($conn);

    function createTableTraining($conn){
        $sql = "CREATE TABLE IF NOT EXISTS requests (
            rID INT(16) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Time DATETIME NOT NULL,
            name VARCHAR(30) NOT NULL,
            userID VARCHAR(30) NOT NULL,
            training VARCHAR(128) NOT NULL,
            tlocation VARCHAR(256) NOT NULL,
            remark TEXT NOT NULL,
            status VARCHAR(16) NOT NULL
        )";
        mysqli_query($conn, $sql);
    }

    mysqli_close($conn);
    ?>
<?php

    $success = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "expert_db";

    $conn = new mysqli($servername, $username, $password, $dbName);

    $tName = isset($_GET['tName']) ? $_GET['tName'] : '';
    $tLocation = isset($_GET['tLocation']) ? $_GET['tLocation'] : '';

    if ($conn->connect_error) {
        die("Fail conection: " . $conn->connect_error);
    }

    if (isset($_POST['save_training'])){
        $name = $_POST["name"];
        $training = $_POST["training"];
        $location = $_POST["location"];
        $remark = $_POST["remark"];

        $trainingErr = "";
      if ($training == '') {
        $trainingErr = "Please choose your training！";
      }

      if ($trainingErr == ''){
        $current_time = date('Y-m-d H:i:s');
        $status = "pending";
        $userID = $_POST['userID'];
        $sql = "INSERT INTO requests (name, userID, Time, training, tlocation, remark, status) VALUES ('$name', '$userID', '$current_time', '$training', '$location', '$remark', '$status')";

        if ($conn->query($sql) === TRUE) {
           $success = "Submission successful! Request pending for Approval";
        } else {
            $success =  "Something is wrong, please try later";
        }
      }
    }

    $conn->close();
?>
<div class="header-container">
<div class="logo-container">
  <div class="logo">
    <h1 class="logo-text">Expert<span class="trademark">&reg;</span></h1>
  </div>
  <?php include 'navigation.php';?>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
    <br>
  <form class="container" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h2 class="center">Client Request Form</h2>
    <label for="name">Name:</label>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "expert_db";

    if (isset($_SESSION['useruid'])) {

    require_once 'includes/db.inc.php';
    require_once 'includes/functions.inc.php';

    $uidExists = uidExists($conn, $_SESSION['useruid'], $_SESSION['useruid']);
    // Display the details of the logged-in user
     echo '<input type="text" id="name" name="name" value="' . $uidExists['usersUid'] . '" readonly>';
     echo '<input type="hidden" id="userID" name="userID" value="'. $_SESSION['userid'].'"/>';
     $sql = "SELECT usersId, usersName, usersUid from users";
     $result = $conn-> query($sql);
     $conn-> close();
    }


      $name = "";
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "expert_db";
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
         }

        // Get trainings with the desired tCategory values
        $sql5 = "SELECT tLocation FROM trainings WHERE tName = '$name'";
        $result = $conn->query($sql5);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $train_loc = $row["tLocation"];
          }
      }
      $conn->close();


    ?>
    <br>
    <br>
    <label for="training">Training:</label>
    <?php
    if(isset($_POST['enquire'])){
      $train_name = $_POST['tName'];
    } else {
      $train_name = '';
    }
     ?>
    <script>
      function autofill(){
        const select = document.getElementById('tName');
        $name = select.value;
      }
    </script>
    <select name="training" id="tName" value="<?php echo $train_name ?>" onchange="autofill()">
      <option value="">-</option>
      <optgroup label="Segmentation Workshop">
      <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "expert_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get trainings with the desired tCategory values
            $sql = "SELECT tName FROM trainings WHERE tCategory IN ('Segmentation')";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output each training as an option in the dropdown menu
                while($row = $result->fetch_assoc()) {
                    if ($train_name == $row['tName']){
                      echo "<option value='" . $row['tName'] ."'" . " selected" . ">" . $row['tName'] . "</option>";
                    }else{
                      echo "<option value='" . $row['tName'] . "'>" . $row['tName'] . "</option>";
                    }
                }
            }else {
              echo '<option value="-">-</option>';
            }

            // Close database connection
            $conn->close();
      ?>
      </optgroup>
      <optgroup label="Co-Creation Workshop">
      <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "expert_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get trainings with the desired tCategory values
            $sql = "SELECT tName FROM trainings WHERE tCategory IN ('Co-Creation')";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output each training as an option in the dropdown menu
                while($row = $result->fetch_assoc()) {
                  if ($train_name == $row['tName']){
                    echo "<option value='" . $row['tName'] ."'" . " selected" . ">" . $row['tName'] . "</option>";
                    }else{
                      echo "<option value='" . $row['tName'] . "'>" . $row['tName'] . "</option>";
                    }
                }
            }else {
              echo '<option value="-">-</option>';
            }

            // Close database connection
            $conn->close();
      ?>
      </optgroup>
      <optgroup label="Consumer Brainstorm Workshop">
      <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "expert_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get trainings with the desired tCategory values
            $sql = "SELECT tName FROM trainings WHERE tCategory IN ('Brainstorm')";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output each training as an option in the dropdown menu
                while($row = $result->fetch_assoc()) {
                  if ($train_name == $row['tName']){
                    echo "<option value='" . $row['tName'] ."'" . " selected" . ">" . $row['tName'] . "</option>";
                  }else{
                    echo "<option value='" . $row['tName'] . "'>" . $row['tName'] . "</option>";
                  }
                }
            }else {
              echo '<option value="-">-</option>';
            }

            // Close database connection
            $conn->close();
      ?>
      </optgroup>
      <optgroup label="Team Activation Workshop">
      <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "expert_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get trainings with the desired tCategory values
            $sql = "SELECT tName FROM trainings WHERE tCategory IN ('Activation')";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output each training as an option in the dropdown menu
                while($row = $result->fetch_assoc()) {
                  if ($train_name == $row['tName']){
                    echo "<option value='" . $row['tName'] ."'" . " selected" . ">" . $row['tName'] . "</option>";
                  }else{
                    echo "<option value='" . $row['tName'] . "'>" . $row['tName'] . "</option>";
                  }
                }
            }else {
              echo '<option value="-">-</option>';
            }

            // Close database connection
            $conn->close();
      ?>
      </optgroup>
    </select>
    <span class="error"><?php if (isset($trainingErr)) { echo $trainingErr; } ?></span>
    <br><br>

    <label for="location">Location:</label>
    <?php
    if(isset($_POST['enquire'])){
      $train_loc = $_POST['tLocation'];
    } else {
      $train_loc = '';
    }

     ?>
      <input type="text" id="tLocation" name="location" value="<?php echo $train_loc ?>" readonly>

    <br><br>

	<label for="remark">Remark:</label>
    <textarea name="remark" id="remark"></textarea>

  <input name="save_training" type="submit" value="Submit">
<div id="successMessage" class="success-message"><?php echo $success;?></div>
<script>
    function showSuccessMessage(event) {
      event.preventDefault(); // Prevent form submission

      var successMessage = document.getElementById("successMessage");
      successMessage.style.display = "block";
    }
  </script>
<script src="transfer.js"></script>
<script>
  /*var trainingSelect = document.getElementById("training");
  var locationSelect = document.getElementById("location");

  trainingSelect.addEventListener("change", function() {
    var training = trainingSelect.value;

    if (training == "Target Market Segmentation Workshop") {

      locationSelect.value = "Swinburne Sarawak";
    } else if (training == "User Persona Segmentation Workshop") {

      locationSelect.value = "BCCK";
    } else if (training == "Product Positioning Segmentation Workshop") {

      locationSelect.value = "MBKS";
    } else if (training == "Product Innovation Co-Creation Workshop") {

      locationSelect.value = "Swinburne Sarawak";
    } else if (training == "Service Experience Co-Creation Workshop") {

      locationSelect.value = "BCCK";
    } else if (training == "Brand Storytelling Co-Creation Workshop") {

      locationSelect.value = "MBKS";
    } else if (training == "Consumer Insight Brainstorm Workshop") {

      locationSelect.value = "Swinburne Sarawak";
    } else if (training == "Product Demand Brainstorm Workshop") {

      locationSelect.value = "BCCK";
    } else if (training == "Marketing Creative Brainstorm Workshop") {

      locationSelect.value = "MBKS";
    } else if (training == "Team Collaboration Activation Workshop") {

      locationSelect.value = "Swinburne Sarawak";
    } else if (training == "Team Culture Activation Workshop") {

      locationSelect.value = "BCCK";
    } else if (training == "Team Decision-Making Activation Workshop") {

      locationSelect.value = "MBKS";
    } else {
      locationSelect.value = "";
    }
  });*/

</script>

</form>
<br><br>

</body>
</html>
