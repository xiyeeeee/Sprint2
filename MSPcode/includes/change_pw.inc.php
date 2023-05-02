<?php
session_start();

if (isset($_POST["change_pass"])){

    $oldPwd = $_POST["old_pass"];
    $newPwd = $_POST["new_pass"];
    $newPwdRpt = $_POST["new_pass_repeat"];
    $userID = $_SESSION["userid"];
    $username = $_SESSION["useruid"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputChangePassword($oldPwd, $newPwd, $newPwdRpt) !== false){
        header("location: ../change_password.php?error=emptyinput");
        exit();
    }
    if (wrongOldPassword($conn, $oldPwd, $username) !== false){
        header("location: ../change_password.php?error=wrongoldpassword");
        exit();
    }
    if (pwdMatchOldChange($oldPwd, $newPwd) !== false){
        header("location: ../change_password.php?error=passwordmatchold");
        exit();
    }
    if (pwdMatchChange($newPwd, $newPwdRpt) !== false){
        header("location: ../change_password.php?error=passwordnotsame");
        exit();
    }

    changePassword($conn, $newPwd, $userID);

} else {
    header("location: ../change_password.php");
    exit();
}
