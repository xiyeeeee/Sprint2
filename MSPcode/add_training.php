<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="script.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<title>TRAINING: ETMP</title>
</head>
<body id="add_trainingbg">
<div class= "dashboard-container">
  <div class="header-container">
  <div class="logo-container">
    <div class="logo">
      <h1 class="logo-text">Expert<span class="trademark">&reg;</span></h1>
    </div>
    <?php include 'adminNav.php';?>
  </div>
  </div>
  </div>
	<br></br>
    <br></br>
    <br></br>



	<?php

    require_once "includes/connect.php";

    $output = "";
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $target_dir = "img/trainingImg/";
        $target_file = $target_dir . $_POST["tName"] . ".png";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if($_FILES["fileToUpload"]["error"] != '4' || $_FILES["fileToUpload"]["error"] != '0' && $_FILES["fileToUpload"]["size"] != '0'  ){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $output = $output .  "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else { 
            $output = $output .  "File is not an image.";
            $uploadOk = 0;
        }
        if (file_exists($target_file)) {
            $output = $output .  "Sorry, training already exists.";
            $uploadOk = 0;
        }

        if ((!isset($_POST["tName"]) && !isset($_POST["tCategory"]) && !isset($_POST["tLocation"]) && !isset($_POST["tDescription"]) && !isset($_POST["tPrice"]))){
            $output = $output .  "Please fill in all fields";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            $output = $output .  "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
            $tName = $_POST["tName"];
            $tCategory = $_POST["tCategory"];
            $tLocation = $_POST["tLocation"];
            $tDescription = $_POST["tDescription"];
            $tPrice = $_POST["tPrice"];

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $output = $output .  "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
              $sql = "INSERT IGNORE INTO trainings (tName, tCategory, tLocation, tDescription, tPrice)
                    VALUES ('$tName', '$tCategory', '$tLocation', '$tDescription', '$tPrice')";

            mysqli_query($conn, $sql);
            if ( mysqli_affected_rows($conn)>0){
                $output = $output .  "Records inserted successfully.";
            }else{
            $output += "There is an existing training. Please use a different number<p>";
            }
            } else {
              $output = $output . "Sorry, there was an error adding the training.";
            }
          }
        }else{
            $output = $output . "Please fill in all fields.";
        }

        }

    ?>
    <div class= "training-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">


    <p class="file-container"><label for="fileToUpload">Image:</label>
        <input type="file" name="fileToUpload" id="fileToUpload"/></p>
        <p><label for="tName">Training Name: </label>
        <input type="text" name="tName" id="tName"/></p>

        <p><label for="tCategory">Training Category: </label>
        <select name="tCategory" id="tCategory">
            <option value="Segmentation">Segmentation Workshop</option>
            <option value="Co-creation">Co-creation Workshop</option>
            <option value="Brainstorm">Brainstorm Workshop</option>
            <option value="Activation">Team Activation Workshop</option>
        </select></p>
        <p><label for="tLocation">Training Location: </label>
        <input type="text" name="tLocation" id="tLocation"/></p>
        <p><label for="tPrice">Training Price: </label>
        <input type="text" name="tPrice" id="tPrice"/></p>
        <p><label for="tDescription">Training Description: </label>
        <input type="text" name="tDescription" id="tDescription"/></p>


        <p class="addtrainingtxt"><input type="submit" value="Add" name="submit"/></p>
    </form>
    <p><?php echo $output?></p>
    </div>

    <footer>
    <div class="footer-container">
      <div class="footer-column">
        <ul class="footer-nav">
          <li><a href="#">Training</a></li>
          <li><a href="#">Payment</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Account</a></li>
        </ul>
        <p class="footer-info">Phone: 123-456-7890 | Address: 123 Main St. | Email: info@expert.com</p>
        <div class="footer-logo">

          <p class="footer-copyright">Expert Training since 2023 &#169; </p>
        </div>
      </div>
      <div class="footer-column">
        <ul class="social-icons">
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>

      <script src="script/buttontop.js"></script>
</body>
</html>
</html>
