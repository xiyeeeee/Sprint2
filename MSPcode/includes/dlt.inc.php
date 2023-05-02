<?php
session_start();

if (isset($_POST["delete"])){

    $userID = $_POST["selected_user_id"];
    $username = $_POST["selected_user_name"];
    $password = $_POST["pass"];
    $password_repeat = $_POST["pass_repeat"];
    $currentID = $_SESSION["userid"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';


    if (emptyInputDelete($password, $password_repeat) !== false){
        header("location: ../profile.php?error=emptyfields");
        exit();
    }
    if (wrongPassword($conn, $password, $username) !== false){
        header("location: ../profile.php?error=passworderror");
        exit();
    }
    if (pwdMatchDelete($password, $password_repeat) !== false){
        header("location: ../profile.php?error=passwordnotsame");
        exit();
    }
    deleteUser($conn, $userID, $currentID);
} else {
    header("location: ../register.php");
    exit();
}
