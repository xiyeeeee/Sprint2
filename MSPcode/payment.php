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

<form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='post'>
    <?php
    
    if(isset($_GET['bID'])){
        $bID = $_GET['bID'];
    }else{
        $bID = $_POST['bID'];
    }

    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "expert_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM booking WHERE bID='$bID'";
    $result = $conn->query($sql);

    if(isset($_POST["Pay"])){
        $sql2 = "UPDATE booking SET paymentStatus = true WHERE bID='$bID'";
        if(mysqli_query($conn, $sql2)){
            header("Location:payment_successful.php");
        }
    }

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["bID"] . "<br>";
            echo "Name: " . $row["tName"] . "<br>";
            echo "Category: " . $row["tCategory"] . "<br>";
            echo "Location: " . $row["tLocation"] . "<br>";
            echo "Price: " . $row["tPrice"] . "<br>";
            echo "Itinerary: " . $row["bItinerary"] . "<br>";
            echo "Payment Status: " . ($row['paymentStatus'] ? "Paid":"Unpaid"). "<br>";
            echo "Payment Due: " . $row["paymentDue"] . "<br>";
            echo "Date: " . $row["tDate"] . "<br>";
            echo "<a href='payment_successful.php' class='button'>Pay</a>";
            echo "<button id='card-pay-button' onclick='showCardInput()' type='button'>Card Pay</button>"; 
            echo "<div id='card-input-container' style='display: none;'>";
            echo "<input type='text' id='card-input' name='cardNumber' placeholder='Enter Card Number' />";
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='bID' value='" . $row["bID"] . "'>";
            echo "<input type='submit' id='Pay' name='Pay' value='Pay' />";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>


<br>
<br>
<script src="https://kit.fontawesome.com/2076012a21.js" crossorigin="anonymous"></script>
<script src="script/buttontop.js"></script>
<script src="script/app.js"></script>
<script>
    function showCardInput() {
        var cardPayButton = document.getElementById("card-pay-button");
        var cardInputContainer = document.getElementById("card-input-container");
        cardPayButton.style.display = "none";
        cardInputContainer.style.display = "block";
    }
</script>
</body>
</html>
