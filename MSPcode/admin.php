<?php
// Define a variable for the page title
$pageTitle = "Admin Dashboard";
?>

<!-- Start of HTML code -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <script src="script.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<button id="back-to-top-btn"><i class="fas fa-angle-double-up"></i></button>
<div class="dashboard-container">
      <div class="header-container">
  <div class="logo-container">
    <div class="logo">
      <h1 class="logo-text">Expert<span class="trademark">&reg;</span></h1>
    </div>
      <?php include 'adminNav.php';?>
  </div>
</div>


    <!--<div class="dashboard">
        <a href="#">
        <div class="category">
          <div class="slideshow">
            <img src="./img/TrainingManagement.png">

            <img src="./img/FileManagement2.png">
          </div>
          <h2 class= training-heading>Training Management</h2>
        </div>
    </a>


    <a href="test.html">
        <div class="category">
          <div class="slideshow">
            <img src="./img/RequestManagement2.png">

            <img src="./img/RequestManagement3.png">
          </div>
          <h2 class= training-heading>Request Management</h2>
        </div>
        </a>


        <a href="test.html">
        <div class="category">
          <div class="slideshow">

            <img src="./img/OrderManagement.png">
            <img src="./img/OrderManagement2.png">
          </div>
          <h2 class= training-heading>Booking Management</h2>
        </div>
    </a>


        <a href="test.html">
        <div class="category">
          <div class="slideshow">
            <img src="./img/FileManagement.png">

            <img src="./img/FileManagement3.png">
          </div>
          <h2 class= training-heading>Itinerary Management</h2>
        </div>
    </a>

        <br>
        <br>
        <br>



      </div>-->
      <div class="dashboard">
        <a href="add_training.php">
        <div class="category">
          <div class="slideshow">
            <img src="./img/TrainingManagement.png">

            <img src="./img/FileManagement2.png">
          </div>
          <h2 class= my-heading>Training</h2>
        </div>
    </a>


    <a href="manage_request.php">
        <div class="category">
          <div class="slideshow">
            <img src="./img/RequestManagement2.png">

            <img src="./img/RequestManagement3.png">
          </div>
          <h2 class= my-heading >Request</h2>
        </div>
        </a>


        <a href="#">
        <div class="category">
          <div class="slideshow">

            <img src="./img/ChatManagement2.png">
            <img src="./img/livechat.jpeg">
          </div>
          <h2 class= my-heading>Chat</h2>
        </div>
    </a>


        <a href="adminBooking.php">
        <div class="category">
          <div class="slideshow">
            <img src="./img/FileManagement.png">

            <img src="./img/FileManagement3.png">
          </div>
          <h2 class= my-heading>Booking</h2>
        </div>
    </a>

        <br>
        <br>
        <br>



      </div>
      <div class="new-section">
        <div class="left-column">
        <p>Welcome to the Expert Training Portal, your go-to platform for booking personalized training plans. Discover a wide range of comprehensive programs in various domains, from technology to leadership. Our user-friendly portal enables easy browsing and detailed program exploration. Book your preferred training dates and locations effortlessly, track your progress, and access supplementary resources through your personalized dashboard. Stay informed with timely notifications and updates. With a focus on quality and client satisfaction, our portal ensures a seamless and efficient experience. Join us on the Expert Training Portal to unlock your potential and shape a brighter future through continuous growth.</p>
    </div>
    <div class="right-column">
  <div class="slideshow-container">
  <iframe src="https://www.youtube.com/embed/YvrKIQ_Tbsk?autoplay=1&rel=0&mute=1" width="560" height="315" title="Cardio vs. strength training: What you need to know" frameborder="0" allowfullscreen></iframe>
</div>

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
  </div>
  </div>
 
<script src="script/buttontop.js"></script>
</body>
</html>
