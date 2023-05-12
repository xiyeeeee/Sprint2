<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="header-container">
  <div class="logo-container">
    <div class="logo">
      <h1 class="logo-text">Expert<span class="trademark">&reg;</span></h1>
    </div>
    <?php include 'navigation.php';?>
  </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
    <div id="chatlog"></div>
    
    <form method="post" onsubmit="sendMessage(); return false;">
    <label for="name">Name:</label>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "expert_db";

    if (isset($_SESSION['useruid'])) {

    require_once 'includes/db.inc.php';
    require_once 'includes/functions.inc.php';

    $uidExists = uidExists($conn, $_SESSION['useruid'], $_SESSION['useruid']);
            if (isset($uidExists['usersUid']) && !empty($uidExists['usersUid'])) {
                echo '<input type="text" id="name" name="name" value="' . $uidExists['usersUid'] . '" readonly>';
            }

     $sql = "SELECT usersName, usersUid from users";
     $result = $conn-> query($sql);
     $conn-> close();
}
?><br><br>
        <label for="recipient">To:</label>
        <input type="text" name="recipient" value="admin" readonly><br><br>
        <label for="message">Message:</label>
        <textarea name="message"></textarea><br><br>
        <input type="submit" value="Send">
    </form>
    
    <script>
        function refreshChatLog() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("chatlog").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "chat.php", true);
            xhr.send();
        }
        setInterval(refreshChatLog, 1000);
        
        function sendMessage() {
            var form = document.querySelector("form");
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    form.reset();
                }
            };
            xhr.open("POST", "chat.php", true);
            xhr.send(new FormData(form));
        }
    </script>
</body>
</html>
