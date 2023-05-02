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
    <title>LOGIN: ETMP</title>
</head>
<body id="logbg">
    <article>
        <section class="login_section">
            <div class="login_container">
                <div class="user">
                    <div class="imgBx">
                        <img src="img/log.webp" alt="Background">
                    </div>
                    <div class="formBx">
                        <form action="includes/login.inc.php" method="post">
                            <h2>Login</h2>
                            <input type="text" name="login_name" placeholder="Username/Email" />
                            <input type="password" name="login_password" placeholder="Password" />
                            <button type="submit" name="submit">Login</button>
                            <p class="register_txt">Don't have an account? <a href="register.php">Register</a></p>
                            <?php
                            if (isset($_GET["error"])){
                                if ($_GET["error"] == "emptyinput"){
                                    echo "<p class='errormsg'>Fill in all fields!</p>";
                                }
                                else if ($_GET["error"] == "wronglogin"){
                                    echo "<p class='errormsg'>Incorrect login information!</p>";
                                }
                            }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </article>
    <script src="script/nav.js"></script>
    <script src="https://kit.fontawesome.com/2076012a21.js" crossorigin="anonymous"></script>
</body>
</html>
