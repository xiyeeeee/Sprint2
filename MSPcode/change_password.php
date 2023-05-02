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
      <title>PASSWORD: ETMP</title>
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
        <div class="change-password-form">
            <?php echo "<h2>Change Password? " . $_SESSION['useruid']?>
            <form action="includes/change_pw.inc.php" method="post">
                <input type="password" name="old_pass" placeholder="Old Password" />
                <input type="password" name="new_pass" placeholder="New Password" />
                <input type="password" name="new_pass_repeat" placeholder="Repeat New Password" />
                <button type="submit" name="change_pass">Change Password</button>
            </form>
            <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput"){
                        echo "<p>Fill in all fields!</p>";
                    }
                    else if ($_GET["error"] == "wrongoldpassword"){
                        echo "<p>Wrong old password!</p>";
                    }
                    else if ($_GET["error"] == "passwordmatchold"){
                        echo "<p>New password is the same as the old password!</p>";
                    }
                    else if ($_GET["error"] == "passwordnotsame"){
                        echo "<p>Password do not match!</p>";
                    }
                    else if ($_GET["error"] == "stmtfailed"){
                        echo "<p>Something went wrong, try again!</p>";
                    }
                    else if ($_GET["error"] == "none"){
                        echo "<p>Password Changed!</p>";
                    }
                }
            ?>
        </div>
    </article>
    <script src="https://kit.fontawesome.com/2076012a21.js" crossorigin="anonymous"></script>
</body>
</html>
