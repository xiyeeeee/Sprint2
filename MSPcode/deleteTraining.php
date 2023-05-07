<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="script.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title></title>
</head>
<body id="deleteTrainingbg">
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
      <br></br>
    <?php
    include_once "includes/connect.php";

    $deleted = "";
    ?>

<div class="dltbody">
    <!--<h1>Delete Training</h1>-->
    
    <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='post'>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $names = $_POST["oNames"];
        if($_POST["submit"]=="Yes"){
            $sql ="DELETE FROM trainings WHERE tName = '$names'";
            if(mysqli_query($conn, $sql)){
                $deleted = "The Training has been deleted";
                unlink("img/trainingImg/".$names.".png");
            }else{
                $deleted = "Something went wrong!";
            }
        }elseif($_POST["submit"]=="No"){
            header("Location:displayTrainingInfo.php?names=$names");
        }
    }else{
        $names = $_GET['sName'];
        echo "<fieldset>";
        echo "<legend>Are you sure you want to delete?</legend>";
        echo "<input type='submit' name='submit' value='Yes'/>";
        echo "<input type='submit' name='submit' value='No'/>";
        echo "</fieldset>";
    }
    ?>
    <p><input type="hidden" value='<?php echo "$names"?>' name="oNames"/></p>
    <p class="warning"><?php echo $deleted?></p>
    </form>
    </p>
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