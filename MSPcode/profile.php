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
        <title>PROFILE: ETMP</title>
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
</article>
<section class="profile-container">
        <?php
            // Check if the user is logged in
            if (isset($_SESSION['useruid'])) {

              require_once 'includes/db.inc.php';
              require_once 'includes/functions.inc.php';

              $uidExists = uidExists($conn, $_SESSION['useruid'], $_SESSION['useruid']);

              // Display the details of the logged-in user
              echo "<h1>User Details</h1>";
              echo "<p>Name: " . $uidExists['usersName'] . "</p>";
              echo "<p>Email: " . $uidExists['usersEmail'] . "</p>";
              echo "<p>Username: " . $uidExists['usersUid'] . "</p>";
              echo "<p>Password: " . $uidExists['usersPwd'] . "</p>";
              echo "<p>Registration Date & Time: " . $uidExists['regDate'] . "</p>";

              $sql = "SELECT usersId, usersName, usersEmail, usersUid from users";
              $result = $conn-> query($sql);



              $conn-> close();
              // add more details as required
            } else {
              // If the user is not logged in, redirect to the login page
              header("Location: login.php");
              exit();
            }
        ?>
    </section>
<br>
<br>
<script src="https://kit.fontawesome.com/2076012a21.js" crossorigin="anonymous"></script>
<script src="script/buttontop.js"></script>
</body>
</html>
