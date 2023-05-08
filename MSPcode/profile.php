<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Basic HTML elements"/>
      	<meta name="keywords" content="HTML5, tags"/>
      	<meta name="author" content="Nicholas"/>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="img/fav-icon.jpg" type="image/jpg">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <title>PROFILE: ETMP</title>
    </head>
<body id="profilebg">
<button id="back-to-top-btn"><i class="fas fa-angle-double-up"></i></button>

<article>
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</article>
<?php
if (isset($_SESSION['useruid'])) {
    require_once 'includes/db.inc.php';
    require_once 'includes/functions.inc.php';

    $uidExists = uidExists($conn, $_SESSION['useruid'], $_SESSION['useruid']);
    $userId = $uidExists["usersId"];
    // Handle the profile picture upload
    if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
      $file = $_FILES['file'];

      // Specify the target directory where the profile pictures will be stored
      $targetDirectory = 'img/profile_pictures/';

      // Generate a unique filename for the uploaded picture
      $target_file = $targetDirectory . $uidExists["usersId"] . ".png";
      if(file_exists($target_file)){
        unlink($target_file);
      }
      // Move the uploaded file to the target directory
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
          
          echo "Profile picture uploaded successfully!";
      } else {
          echo "Failed to move the uploaded file.";
      }
    }
    // Continue with the rest of the code for the logged-in user
    echo '<section class="profile-container">';
    // Display the details of the logged-in user
    echo "<h1>User Details</h1>";
    echo "<p>Name: " . $uidExists['usersName'] . "</p>";
    echo "<p>Email: " . $uidExists['usersEmail'] . "</p>";
    echo "<p>Username: " . $uidExists['usersUid'] . "</p>";
    echo "<p>Registration Date & Time: " . $uidExists['regDate'] . "</p>";
    echo '</section>';
    $sql = "SELECT usersId, usersName, usersEmail, usersUid from users";
    $result = $conn-> query($sql);

    $conn-> close();
  } else {
    // If the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
  }
  $img = "img/profile_pictures/". $userId. ".png";
  if(!file_exists($img)){
    $img = "img/profilepic.jpg";
  }
?>
<div class="profile-pic-div">
  <img <?php echo "src='$img'"?> id="photo">
  <input type="file" id="file" onchange="uploadProfilePicture()">
  <label for="file" id="uploadBtn">Choose Photo</label>
</div>

<script>
  function uploadProfilePicture() {
    var fileInput = document.getElementById('file');
    var file = fileInput.files[0];

    var formData = new FormData();
    formData.append('file', file);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'profile.php', true); // Replace 'upload.php' with the PHP file handling the upload
    xhr.onload = function() {
      if (xhr.status === 200) {

        console.log(xhr.responseText);
      }
    };
    xhr.send(formData);
  }
</script>
<br>
<br>
<script src="https://kit.fontawesome.com/2076012a21.js" crossorigin="anonymous"></script>
<script src="script/buttontop.js"></script>
<script src="script/app.js"></script>
</body>
</html>
