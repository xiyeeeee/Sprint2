<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "expert_db";

    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
        die("Connection failed: " .  mysqli_connect_error());
    }

    //Create database if not exists
    $createDB = "CREATE DATABASE IF NOT EXISTS $dbName";
    mysqli_query($conn, $createDB);

    mysqli_close($conn);

    $conn = mysqli_connect($servername, $username, $password, $dbName);
    if (!$conn) {
        die("Connection failed: " .  mysqli_connect_error());
    }

    createTableTraining($conn);
    createTableBooking($conn);

    function createTableTraining($conn){
        $sql = "CREATE TABLE IF NOT EXISTS trainings (
            tID INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            tName VARCHAR(128) NOT NULL,
            tCategory VARCHAR(128) NOT NULL,
            tLocation VARCHAR(128) NOT NULL,
            tPrice VARCHAR(128) NOT NULL,
            tDescription VARCHAR(128) NOT NULL
        )";

        mysqli_query($conn, $sql);
    }

    function createTableBooking($conn){
        $sql = "CREATE TABLE IF NOT EXISTS booking (
            bID INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            userID VARCHAR(128) NOT NULL,
            tName VARCHAR(128) NOT NULL,
            tCategory VARCHAR(128) NOT NULL,
            tLocation VARCHAR(128) NOT NULL,
            tPrice VARCHAR(128) NOT NULL,
            bItenerary VARCHAR(128) NOT NULL,
            paymentStatus Boolean NOT NULL,
            paymentDue DATETIME NOT NULL,
            tDate DATETIME NOT NULL
        )";

        mysqli_query($conn, $sql);
    }
?>
