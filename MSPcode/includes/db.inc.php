<?php
function checkConnection($conn){
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    };
}

function createDatabase($conn){
    $sql = "CREATE DATABASE IF NOT EXISTS expert_db";
    mysqli_query($conn, $sql);
}

function createTableUsers($conn){
    $sql = "CREATE TABLE IF NOT EXISTS users (
        usersId INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        usersName VARCHAR(128) NOT NULL,
        usersEmail VARCHAR(128) NOT NULL,
        usersUid VARCHAR(128) NOT NULL,
        usersPwd VARCHAR(128) NOT NULL,
        regDate TIMESTAMP
    )";

    mysqli_query($conn, $sql);
}

function createTableEnquiry($conn){
    $sql = "CREATE TABLE IF NOT EXISTS enquiry (
        enq_Id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        enq_FirstName VARCHAR(128) NOT NULL,
        enq_LastName VARCHAR(128) NOT NULL,
        enq_Email VARCHAR(128) NOT NULL,
        enq_Phone VARCHAR(128) NOT NULL,
        enq_StreetAddress VARCHAR(128) NOT NULL,
        enq_City VARCHAR(128) NOT NULL,
        enq_State VARCHAR(128) NOT NULL,
        enq_Postcode VARCHAR(128) NOT NULL,
        enq_Subject VARCHAR(128) NOT NULL,
        enq_Products VARCHAR(128) NOT NULL,
        enq_Comments VARCHAR(128) NOT NULL,
        enq_Date TIMESTAMP
    )";

    mysqli_query($conn, $sql);
}

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "031101abc";
$dBName = "expert_db";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword);
checkConnection($conn);

createDatabase($conn);

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
checkConnection($conn);

createTableUsers($conn);
createTableEnquiry($conn);
