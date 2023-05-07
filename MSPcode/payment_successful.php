<?php
// Define a variable for the page title
$pageTitle = "Payment Successful";
?>

<!-- Start of HTML code -->
<!DOCTYPE html>
<html lang="en">
<head>

    <title>PAYMENT SUCCESSFUL</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style4.css">
    <script src="script.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body id="spaymentbg">
<div class="header-container">
  <div class="logo-container">
    <div class="logo">
      <h1 class="logo-text">Expert<span class="trademark">&reg;</span></h1>
    </div>
    <?php include 'navigation.php';?>
  </div>
  </div>

  <div class="payment-container">
		<div class="box">
			<h1 class="payment-alert">Your payment is successful</h1>
			<p class="payment-msg">Please check for your booking details in the booking page.</p>
			<div class="select-buttons">
				<a href="#" class="abutton">Go to booking page</a>
				<a href="#" class="abutton">Sign up for another plan</a>
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
</body>
</html>