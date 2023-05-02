<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="description" content="Basic HTML elements"/>
      <meta name="keywords" content="HTML5, tags"/>
      <meta name="author" content="Nicholas"/>
      <meta http-equiv="Cache-control" content="no-cache">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="img/fav-icon.jpg" type="image/jpg">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <title>REGISTER: ETMP</title>
    </head>
<body id="regbg">
    <article>
        <section class="register_section">
                <div class="register_container">
                    <div class="user">
                        <div class="formBx">
                            <form action="includes/reg.inc.php" method="post">
                                <h2>REGISTRATION</h2>
                                <input type="text" name="register_name" placeholder="Full Name" />
                                <input type="text" name="register_email" placeholder="Email" />
                                <input type="text" name="register_username" placeholder="Username" />
                                <input type="password" name="register_password" placeholder="Password" />
                                <input type="password" name="register_password_repeat" placeholder="Repeat password"/>
                                <button type="submit" name="submit">Register</button>
                                <p class="login_txt">Have an account? <a href="login.php">Login</a></p>
                                <?php
                                    if (isset($_GET["error"])){
                                        if ($_GET["error"] == "emptyinput"){
                                            echo "<p class='errormsg'>Fill in all fields!</p>";
                                        }
                                        else if ($_GET["error"] == "invaliduid"){
                                            echo "<p class='errormsg'>Choose a proper username!</p>";
                                        }
                                        else if ($_GET["error"] == "invalidemail"){
                                            echo "<p class='errormsg'>Choose a proper email!</p>";
                                        }
                                        else if ($_GET["error"] == "passwordsdontmatch"){
                                            echo "<p class='errormsg'>Passwords doesn't match!</p>";
                                        }
                                        else if ($_GET["error"] == "stmtfailed"){
                                            echo "<p class='errormsg'>Something went wrong, try again!</p>";
                                        }
                                        else if ($_GET["error"] == "usernametaken"){
                                            echo "<p class='errormsg'>Username already taken!</p>";
                                        }
                                        else if ($_GET["error"] == "none"){
                                            echo "<p class='errormsg'>Signed up successfully!</p>";
                                        }
                                    }
                                ?>
                            </form>
                        </div>
                        <div class="imgBx">
                            <img src="img/reg.jpg" alt="Background">
                        </div>
                    </div>
                </div>
            </section>
    </article>
    <script src="https://kit.fontawesome.com/2076012a21.js" crossorigin="anonymous"></script>
</body>
</html>
