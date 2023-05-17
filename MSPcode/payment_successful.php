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
				<a href="clientbooking.php" class="abutton1">Back booking page</a>
				<a href="request.php" class="abutton2">Sign up for another training</a>
			</div>
		</div>
	</div>


    <?php
  include('footer.php');
  ?>
</body>
</html>