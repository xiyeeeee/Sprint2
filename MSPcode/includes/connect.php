<?php
    $servername = "localhost";
    $username = "root";
    $password = "031101abc";
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
?>
