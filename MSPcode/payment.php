<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Basic HTML elements"/>
      	<meta name="keywords" content="HTML5, tags"/>
      	<meta name="author" content="Nicholas"/>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="img/fav-icon.jpg" type="image/jpg">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <title>PAYMENT: ETMP</title>
    </head>
<body id="profilebg">
<button id="back-to-top-btn"><i class="fas fa-angle-double-up"></i></button>

<article>
  <div class="header-container">
  <div class="logo-container">
    <div class="logo">
      <h1 class="logo-text">Expert<span class="trademark">&reg;</span></h1>
    </div>
    <?php include 'navigation.php';?>
  </div>
  </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</article>

<?php

// Display training details and payment form
function displayTrainingDetails($tId)
{
    // Retrieve the training details based on the trainingId
    $trainingDetails = getTrainingDetails($tId);

    // Display the training details, including the price
    echo 'Training: ' . $trainingDetails['tName'] . '<br>';
    echo 'Category: ' . $trainingDetails['tCategory'] . '<br>';
    echo 'Location: ' . $trainingDetails['tLocation'] . '<br>';
    echo 'Date: ' . $trainingDetails['tDate'] . '<br>';
    echo 'Deadline: ' . $trainingDetails['paymentDue'] . '<br>';
    echo 'Price: RM' . $trainingDetails['tPrice'] . '<br>';

    // Display the payment form
    echo '<form action="process_payment.php" method="POST">';
    echo '<input type="hidden" name="trainingId" value="' . $tId . '">';
    echo '<label>Card Number:</label>';
    echo '<input type="text" name="cardNumber"><br>';
    echo '<label>Card Expiry:</label>';
    echo '<input type="text" name="cardExpiry"><br>';
    echo '<label>Card CVV:</label>';
    echo '<input type="text" name="cardCVV"><br>';
    echo '<input type="submit" value="Pay">';
    echo '</form>';
}

// Get the training details from the trainingId
function getTrainingDetails($tId)
{
    // Retrieve the training details from your data source
    // This can be a database query, API call, or any other method to fetch the details associated with the trainingId

    // Example: Fetching the training details from a database
    $trainingDetails = "SELECT bID, usersName, tName, tCategory, tLocation, tPrice, bItenerary, paymentStatus, paymentDue, tDate from booking WHERE usersName = $uidExists";
    // Code to retrieve the training details from the database based on the trainingId

    return $trainingDetails;
}

// Example usage
$trainingId = $_GET['trainingId']; // Get the trainingId from the URL parameter or any other source

displayTrainingDetails($trainingId);
?>


<br>
<br>
<script src="https://kit.fontawesome.com/2076012a21.js" crossorigin="anonymous"></script>
<script src="script/buttontop.js"></script>
<script src="script/app.js"></script>
</body>
</html>
