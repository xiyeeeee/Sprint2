<?php
function emptyInputRegister($name, $email, $username, $pwd, $pwdRepeat){
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if ($pwd !== $pwdRepeat){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd){
    $result;
    if (empty($username) || empty($pwd)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdUser = $uidExists["usersPwd"];

    if ($pwd !== $pwdUser){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($pwd == $pwdUser){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../client.php");
        exit();
    }
}

function emptyInputChangePassword($oldPwd, $newPwd, $newPwdRpt){
    $result;
    if (empty($oldPwd) || empty($newPwd) || empty($newPwdRpt)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function wrongOldPassword($conn, $oldPwd, $username){
    $uidExists = uidExists($conn, $username, $username);
    $pwdUser = $uidExists["usersPwd"];

    if ($oldPwd !== $pwdUser){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatchOldChange($oldPwd, $newPwd){
    $result;
    if ($oldPwd == $newPwd){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatchChange($newPwd, $newPwdRpt){
    $result;
    if ($newPwd !== $newPwdRpt){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function changePassword($conn, $newPwd, $userID){
    $query = "UPDATE users SET usersPwd = '$newPwd' WHERE usersId = '$userID';";
    $result = mysqli_query($conn,$query);
    header("location: ../change_password.php?error=none");
    exit();
}

function emptyInputDelete($password, $password_repeat){
    $result;
    if (empty($password) || empty($password_repeat)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function wrongPassword($conn, $password, $username){
    $uidExists = uidExists($conn, $username, $username);
    $pwdUser = $uidExists["usersPwd"];

    if ($password !== $pwdUser){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatchDelete($password, $password_repeat){
    $result;
    if ($password !== $password_repeat){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function deleteUser($conn, $userID, $currentID){
    $query = "DELETE FROM users where usersId = '$userID';";
    $result = mysqli_query($conn,$query);
    if ($userID == $currentID){
        session_start();
        session_unset();
        session_destroy();
        header("location: ../login.php?error=none");
        exit();
    }
    header("location: ../users.php?error=none");
    exit();
}
