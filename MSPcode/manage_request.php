<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<script src="script.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<title>REQUEST: ETMP</title>
</head>
<body id="manageRequestbg">
<div class= "dashboard-container">
  <div class="header-container">
  <div class="logo-container">
    <div class="logo">
      <h1 class="logo-text">Expert<span class="trademark">&reg;</span></h1>
    </div>
    <?php include 'adminNav.php';?>
  </div>
  </div>
  </div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "expert_db";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  if (isset($_POST['accept'])) {
		$rID = $_POST['rID'];
    $sql = "UPDATE requests SET status='accepted' WHERE rID = '$rID'";
    mysqli_query($conn, $sql);
  } elseif (isset($_POST['deny'])) {
		$rID = $_POST['rID'];
    $sql = "UPDATE requests SET status='denied' WHERE rID='$rID'";
    mysqli_query($conn, $sql);
  }

  $sql = "SELECT rID, Time, name, training, tLocation, remark, status FROM requests";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
		echo "<th>Date & Time</th>";
    echo "<th>Name</th>";
    echo "<th>Training</th>";
    echo "<th>Location</th>";
    echo "<th>Remark</th>";
    echo "<th>Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["Time"] . "</td>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["training"] . "</td>";
      echo "<td>" . $row["tLocation"] . "</td>";
      echo "<td>" . $row["remark"] . "</td>";
      echo "<td>" . $row["status"] . "</td>";
      echo "<td>";
      echo "<form method='post' action=''>";
      echo "<input type='hidden' name='rID' value='" . $row["rID"] . "'>";
      echo "<button type='submit' name='accept'>Accept</button>";
      echo "<button type='submit' name='deny'>Deny</button>";
      echo "</form>";
      echo "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "No requests";
  }

  mysqli_close($conn);
  ?>

<footer>
    <div class="footer-container">
      <div class="footer-column">
        <ul class="footer-nav">
          <li><a href="#">Training</a></li>
          <li><a href="#">Payment</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Account</a></li>
        </ul>
        <p class="footer-info">Phone: 123-456-7890 | Address: 123 Main St. | Email: info@expert.com</p>
        <div class="footer-logo">

          <p class="footer-copyright">Expert Training since 2023 &#169; </p>
        </div>
      </div>
      <div class="footer-column">
        <ul class="social-icons">
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>

</body>
</html>
