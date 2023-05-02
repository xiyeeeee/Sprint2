<?php

if (isset($_POST["submit"])){

    $name = $_POST["register_name"];
    $email = $_POST["register_email"];
    $username = $_POST["register_username"];
    $pwd = $_POST["register_password"];
    $pwdRepeat = $_POST["register_password_repeat"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputRegister($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false){
        header("location: ../register.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false){
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false){
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

} else {
    header("location: ../register.php");
    exit();
}
