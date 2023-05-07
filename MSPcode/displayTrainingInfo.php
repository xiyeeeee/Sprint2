<!DOCTYPE html>
<html lang="en">
<head>
    <title>TRAINING: ETMP</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="script.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body id="displaybg">
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
        include_once "includes/connect.php";

        $names = $_GET['names'];
        $sql1 = "SELECT * FROM trainings WHERE tName = '$names'";
        $result = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $tName = $row['tName'];
            $tCategory = $row['tCategory'];
            $tLocation = $row['tLocation'];
            $tPrice = $row['tPrice'];
            $tDescription = $row['tDescription'];

            $img = "img/trainingImg/". $tName . ".png";
        }

    ?>
    <h1 class="displayh1">Training Information</h1>
    <div class="display-container">
    <form>
    <img <?php echo "src='$img'"?>/>
    <fieldset>
    <strong>Name</strong>: <?php echo $tName;?></br>
    <strong>Category</strong>: <?php echo $tCategory;?></br>
    <strong>Location</strong>: <?php echo $tLocation;?></br>
    <strong>Price</strong>: <?php echo $tPrice;?></br>
    <strong>Description</strong>: <?php echo $tDescription;?></br>
    <button type="button" onclick="document.location.href='edit_training.php?sName=<?php echo $tName;?>'">Edit</button>
    <button type="button" onclick="document.location.href='deleteTraining.php?sName=<?php echo $tName;?>'">Delete</button>
    </fieldset>
    </form>
    </div>

    <!--<footer>
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
  </footer>-->
  <?php
  include('footer.php');
  ?>

      <script src="script/buttontop.js"></script>
</body>
</html>