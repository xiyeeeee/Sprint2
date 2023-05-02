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
      <title>DELETE: ETMP</title>
</head>
<body id="profilebg">
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
        <div class="delete-form">
            <?php
            $username = $_SESSION['useruid'];

            echo "<p class='confirm-user'>Confirm Delete Account " . $username . "?</p>";
            echo "<p class='warning-delete'>Warning: This action cannot be undone!</p>";


            ?>
            <form action="includes/dlt.inc.php" method="post">
                <input type="password" name="pass" placeholder="Password" />
                <input type="password" name="pass_repeat" placeholder="Repeat Password" />
                <?php
                $userID = $_SESSION['userid'];
                $username = $_SESSION['useruid'];
                echo '<input type="hidden" name="selected_user_id" value="' . $userID . '"/>';
                echo '<input type="hidden" name="selected_user_name" value="' . $username . '"/>';
                ?>
                <button type="submit" name="delete">Delete</button>
            </form>
        </div>
        <br>
    <br>
    <br>
    <br>
    </article>


    <script src="script/nav.js"></script>
    <script src="https://kit.fontawesome.com/2076012a21.js" crossorigin="anonymous"></script>
</body>
</html>
