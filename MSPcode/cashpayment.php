<?php
// Define a variable for the page title
$pageTitle = "Payment Failed";
?>

<!-- Start of HTML code -->
<!DOCTYPE html>
<html lang="en">
<head>

    <title>PAYMENT FAILED</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style4.css">
    <script src="script.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body id="fpaymentbg">
<div class="header-container">
  <div class="logo-container">
    <div class="logo">
      <h1 class="logo-text">Expert<span class="trademark">&reg;</span></h1>
    </div>
    <?php include 'navigation.php';?>
  </div>
  </div>

  <div class="failed-payment-container">
		<div class="box2">
			<h1 class="fpayment-alert">Awaiting your arrival! </h1>
			<p class="fpayment-msg">We are pleased to receive your booking. Your payment could be made by cash <br>on the day of the training at the training venue.
            </p>
			<div class="fselect-buttons">
				<a href="clientbooking.php" class="fbutton1">Back to booking page</a>
				<a href="client.php" class="fbutton2">Check out more trainings</a>
			</div>
		</div>
	</div>


  <?php
  include('footer.php');
  ?>
    
</body>
</html>