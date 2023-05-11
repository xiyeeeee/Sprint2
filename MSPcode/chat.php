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

    function createTableTraining($conn){
        $sql = "CREATE TABLE IF NOT EXISTS messages (
            mID INT(16) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            sender VARCHAR(32) NOT NULL,
            recipient VARCHAR(32) NOT NULL,
            message TEXT NOT NULL,
            timestamp DATETIME NOT NULL
        )";
        mysqli_query($conn, $sql);
    }

    mysqli_close($conn);
    ?>
<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'expert_db';
    $conn = mysqli_connect($host, $user, $password, $database);
    if (!$conn) {
        die("Connection failed: " .  mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sender = $_POST['name'];
        $recipient = $_POST['recipient'];
        $message = $_POST['message'];
        $timestamp = date('Y-m-d H:i:s');
        $sql = "INSERT INTO messages (sender, recipient, message, timestamp) VALUES ('$sender', '$recipient', '$message', '$timestamp')";
        if (mysqli_query($conn, $sql)) {
            echo "success";
        } else {
            echo "fail" . mysqli_error($conn);
        }
    }

    $sql = "SELECT * FROM messages ORDER BY timestamp DESC LIMIT 50";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p><b>{$row['sender']}  TO： </b><b>{$row['recipient']}</b>：{$row['message']} ({$row['timestamp']})</p>";
        }
    } else {
        echo "Something wrong" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
