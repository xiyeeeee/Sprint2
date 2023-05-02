<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8"/>
    <meta name="author" content="Joseph"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body id="searchTrainingbg">
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

  $sName = "";
  $error = "";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["sName"])){
        $error = "Please enter a training name";
    }else{
        $sName = test_input($_POST["sName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$sName)) {
            $error = "Only letters and white space allowed";
        }else{
            $sName = $_POST["sName"];
            header("Location:SearchTrainingProcess.php?sName=$sName");
        }
    }
  }

  function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
  ?>
      <div id="searchTrainingBox">
      <h1 id="sh1">Search Training</h1>
      
    <form id = "searchForm" method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p><label for="sName"><strong>Training Name:</strong></label><br/>
    <input id="sName" name = "sName" type = "text"/><span class = "error"> <?php echo $error;?></span></p>
    <p><input type="submit" value = "Search"/>
    </p>
    </form>
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
