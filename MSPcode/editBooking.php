<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style7.css">
	<script src="script.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<title>TRAINING: ETMP</title>
</head>
<body id="edit_trainingbg">
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
	<br>
</br>
	<br>
</br>
	<br>
</br>
	<?php
	require_once "includes/connect.php";
  if(isset($_GET["bID"])){
    $bID = $_GET["bID"];
  }else{
    $bID = $_POST["bID"];
  }

  $sql2 = "SELECT * FROM booking WHERE bID = '$bID'";
    $result = $conn-> query($sql2);
    $row = mysqli_fetch_assoc($result);

    $userID = $row["userID"];
		$tName = $row["tName"];
    $tCategory = $row["tCategory"];
    $tLocation = $row["tLocation"];
    $tPrice = $row["tPrice"];
    $bItinerary = $row["bItinerary"];
    $paymentStatus = $row["paymentStatus"];
    $paymentDue = $row["paymentDue"];
    $tDate = $row["tDate"];
  
  $output ="";
	if(isset($_POST["submit"])) {
    $uploadOk = 1;
        if (!isset($_POST["tName"]) && !isset($_POST["tCategory"]) && !isset($_POST["tLocation"]) && !isset($_POST["bItinerary"]) && !isset($_POST["tPrice"])&& !isset($_POST["tDate"])){
            $output = $output . "Please fill in all fields";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
          $output = $output . "Sorry, the booking was not updated.";
        } else {
          $tName = $_POST["tName"];
          $tCategory = $_POST["tCategory"];
          $tLocation = $_POST["tLocation"];
          $bItinerary = $_POST["bItinerary"];
          $tPrice = $_POST["tPrice"];
          $tDate = $_POST["tDate"]; 
          $paymentDue = date('Y-m-d', strtotime($tDate. ' + 7 days'));
          if($_POST["paid"] == "Paid"){
            $paid = true;
          }else{
            $paid = false;
          }
          $paymentStatus = $paid;

          $sql = "UPDATE booking SET tName = '$tName', tCategory = '$tCategory', tLocation ='$tLocation', bItinerary='$bItinerary', tPrice = '$tPrice', tDate = '$tDate' , paymentStatus = '$paid', paymentDue = '$paymentDue' WHERE bID = '$bID'";

          if ( mysqli_query($conn, $sql)){
            $output = $output . "Records updated successfully.";
          }else {
            $output = $output . "Sorry, there was an error editing the booking.";
          }
        }
  }
		
	?>
   <div class= "edittraining-form">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

        <p><label for="bId">bID: </label>
        <input type="text" name="bID" id="bID" readonly value ="<?php echo $bID?>"/></p>

        <p><label for="userID">userID: </label>
        <input type="text" name="userID" id="userID" readonly value ="<?php echo $userID?>"/></p>

        <p><label for="tName">Training Name: </label>
        <input type="text" name="tName" id="tName" value ="<?php echo $tName?>"/></p>

        <p><label for="tCategory">Training Category: </label>
        <select name="tCategory" id="tCategory">
            <option value="Segmentation" <?php echo ($tCategory == "Segmentation")? "selected": "" ?>>Segmentation Workshop</option>
            <option value="Co-creation" <?php echo ($tCategory == "Co-creation")? "selected": "" ?>>Co-creation Workshop</option>
            <option value="Brainstorm" <?php echo ($tCategory == "Brainstorm")? "selected": "" ?>>Brainstorm Workshop</option>
            <option value="Activation" <?php echo ($tCategory == "Activation")? "selected": "" ?>>Team Activation Workshop</option>
        </select></p>

        <p><label for="tLocation">Training Location: </label>
        <input type="text" name="tLocation" id="tLocation" value="<?php echo $tLocation?>"/></p>

        <p><label for="tPrice">Training Price: </label>
        <input type="text" name="tPrice" id="tPrice" value="<?php echo $tPrice?>"/></p>

        <p><label for="bItinerary">Booking Itinerary: </label>
        <input type="text" name="bItinerary" id="bItinerary" value="<?php echo $bItinerary?>"/></p>

        <p><label for="tDate">Training Date:</label>
        <input type="datetime-local" id="tDate" name="tDate" value="<?php echo $tDate?>"/></p>

        <p><label>Payment Status: </label> <label for="paid">Paid</label>
        <input type="radio" id="paid" name="paid" value="Paid" <?php echo ($paymentStatus)?"checked":"" ?>/>

        <label for="paid">Unpaid</label>
        <input type="radio" id="Unpaid" name="paid" value="Unpaid" <?php echo ($paymentStatus)?"":"checked" ?>/></p>

        <p class="editbook"><input type="submit" value="Edit" name="submit"/></p>
    </form>
    <p><?php echo $output?></p>
    </div>
</body>
</html>
