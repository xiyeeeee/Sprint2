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
        <title>BOOKING: ETMP</title>
    </head>
<body id="profilebg">
<button id="back-to-top-btn"><i class="fas fa-angle-double-up"></i></button>

<div class="header-container">
<div class="logo-container">
<div class="logo">
    <h1 class="logo-text">Expert<span class="trademark">&reg;</span></h1>
</div>
<?php include 'navigation.php';?>
</div>
</div>
<?php
if (isset($_SESSION['useruid'])) {
    require_once 'includes/db.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'includes/connect.php';

    $sql = "SELECT bID, usersName, tName, tCategory, tLocation, tPrice, bItenerary, paymentStatus, paymentDue, tDate from booking WHERE usersName = $uidExists";
	$result = $conn-> query($sql);

    $uidExists = uidExists($conn, $_SESSION['useruid'], $_SESSION['useruid']);
    $userId = $uidExists["usersId"];

    // Continue with the rest of the code for the logged-in user
    echo '<section class="profile-container">';
    // Display the details of the logged-in user
    echo "<h1>User Details</h1>";
    echo "<p>Training: " . $uidExists['tName'] . "</p>";
    echo "<p>Category: " . $uidExists['tCategory'] . "</p>";
    echo "<p>Location: " . $uidExists['tLocation'] . "</p>";
    echo "<p>Price: " . $uidExists['tPrice'] . "</p>";
    echo "<p>Itenerary: " . $uidExists['bItenerary'] . "</p>";
    echo "<p>Payment Status: " . $uidExists['paymentStatus'] . "</p>";
    echo "<p>Training Date: " . $uidExists['tDate'] . "</p>";
    echo "<p>Payment Deadline: " . $uidExists['paymentDue'] . "</p>";
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
<br>
<br>
<script src="https://kit.fontawesome.com/2076012a21.js" crossorigin="anonymous"></script>
<script src="script/buttontop.js"></script>
</body>
</html>
