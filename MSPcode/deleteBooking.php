<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style6.css">
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
      <?php 
      include_once "includes/connect.php";
      $deleted = "";
      if(isset($_GET['client'])){
        $client = $_GET['client'];
      }else{
        $client = $_POST["client"];
      }
      
      if($client == "true"){
        include 'navigation.php';
      }else{
        include 'adminNav.php';
      }
      ?>
    </div>
    </div>
    </div>
  	<br></br>
      <br></br>
      <br></br>
      <br></br>
    <?php
    
    ?>
<div class="dltbook-container"> 
<div class="dltbodybooking">
    <!--<h1>Delete Training</h1>-->
     
    <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='post'>
    <?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $bID = $_POST["bID"];
        if($_POST["submit"]=="Yes"){
            $sql ="DELETE FROM booking WHERE bID = '$bID'";
            if (mysqli_query($conn, $sql)) {
              $deleted = "<span class='success-message'>The Booking has been deleted</span>";
            } else {
              $deleted = "<span class='error-message'>Something went wrong!</span>";
            }
        }elseif($_POST["submit"]=="No"){
            if($client == "true"){
              header("Location:clientbooking.php");
            }else{
              header("Location:adminBooking.php");
            }
        }
    }else{
        $bID = $_GET['bID'];
        echo "<fieldset>";
        echo "<legend>Are you sure you want to delete?</legend>";
        echo "<input type='submit' name='submit' value='Yes'/>";
        echo "<input type='submit' name='submit' value='No'/>";
        echo "</fieldset>";
    }
    ?>
    <p><input type="hidden" value='<?php echo "$bID"?>' name="bID"/></p>
    <p><input type="hidden" value='<?php echo "$client"?>' name="client"/></p>
    <p class="warning"><?php echo $deleted?></p>
    </form>
  </div>
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