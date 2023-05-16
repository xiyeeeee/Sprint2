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
        <link rel="stylesheet" type="text/css" href="css/style5.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <title>BOOKING: ETMP</title>
    </head>
<body id="bookbg">
<button id="back-to-top-btn"><i class="fas fa-angle-double-up"></i></button>

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
<?php
if (isset($_SESSION['useruid'])) {
    require_once 'includes/db.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'includes/connect.php';

    if(isset($_POST["pay"])){
      $id = $_POST["bID"];
      header("Location:payment.php?bID=$id&client=true");
    }

    if(isset($_POST["delete"])){
      $id = $_POST["bID"];
      header("Location:deleteBooking.php?bID=$id&client=true");
    }

    $uidExists = uidExists($conn, $_SESSION['useruid'], $_SESSION['useruid']);
    $userId = $uidExists["usersId"];

    $sql = "SELECT bID, userID, tName, tCategory, tLocation, tPrice, bItinerary, paymentStatus, paymentDue, tDate from booking WHERE userId = $userId";
	  $result = $conn-> query($sql);

    if (mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr>";
      echo "<th>Booking ID</th>";
      echo "<th>Training</th>";
      echo "<th>Category</th>";
      echo "<th>Location</th>";
      echo "<th>Status</th>";
      echo "<th>Booking Date</th>";
      echo "<th>Deadline</th>";
      echo "<th>Action</th>";
      echo "</tr>";
      
      while ($row = mysqli_fetch_assoc($result)) {
          $bID = $row["bID"];
          $paymentDue = $row["paymentDue"];
          $dueDate = DateTime::createFromFormat('Y-m-d H:i:s', $paymentDue); // Assuming the format of the paymentDue field is 'Y-m-d H:i:s'
  
          if ($dueDate && $dueDate < new DateTime()) {
              echo "<tr class='disabled'>";
          } else {
              echo "<tr>";
          }
          
          echo "<td>" . $row["bID"] . "</td>";
          echo "<td>" . $row["tName"] . "</td>";
          echo "<td>" . $row["tCategory"] . "</td>";
          echo "<td>" . $row["tLocation"] . "</td>";
          
          if ($row["paymentStatus"]) {
              echo "<td>Paid</td>";
          } else {
              echo "<td>Unpaid</td>";
          }
          
          echo "<td>" . $row["tDate"] . "</td>";
          echo "<td>" . $row["paymentDue"] . "</td>";
          echo "<td>";
          echo "<form method='post' action=''>";
          echo "<input type='hidden' name='bID' value='" . $row["bID"] . "'>";
          
          if ($row['paymentStatus']) {
            echo "<button type='submit' name='pay' disabled '>Pay</button>";
          }elseif ($dueDate && $dueDate < new DateTime() && !$row['paymentStatus']){
            echo "<button type='submit' name='pay' disabled class='disabled-pay-button'>Pay</button>";
          }else {
              echo "<button type='submit' name='pay'>Pay</button>";
          }
          
          echo "<button type='submit' name='delete'>Delete</button>";
          echo "</form>";
          echo "</td>";
          echo "</tr>";
      }
      
      echo "</table>";
  } else {
      echo "<div class='ctr'>No Bookings Made Yet</div>";
  }
  }
?>
<br>
<br>
<script src="https://kit.fontawesome.com/2076012a21.js" crossorigin="anonymous"></script>
<script src="script/buttontop.js"></script>
</body>
</html>
