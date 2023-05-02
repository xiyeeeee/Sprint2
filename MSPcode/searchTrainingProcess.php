<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8"/>
    <meta name="author" content="Joseph"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/style4.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body id="searchTrainingProcessbg">
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

        $training = array();
        $sName = $_GET["sName"];
        $sql = "SELECT tName FROM trainings WHERE INSTR(tName, '$sName')> 0";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($training,$row['tName']);
            }
        }


    ?>    

      <div class="stbody">   
      <h1 class="sth1">Training Information</h1>
    
    <form id = "searchProcess" method = "get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
    <legend>Search Results</legend>
    <ul>
    <?php
        if(!empty($training)){
            $count = count($training);
            echo "<p>$count search results.</p>";
            foreach($training as $names){
                echo "<li><a href='displayTrainingInfo.php?names=$names'>$names</a></li>";
            }
        }else{
            echo "<p>No search results</p>";
        }
    ?>
    </ul>
    </fieldset>
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
