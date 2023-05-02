<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "expert_db";

  // Get the selected training name from the query string
  $selectedTrainingName = $_GET["tName"];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch the training locations for the selected training name
  $sql = "SELECT tLocation FROM trainings WHERE tName='$selectedTrainingName'";
   $result = $conn->query($sql);

   $locations = array();

   if ($result->num_rows > 0) {
     // Output each training location as a JSON array
     while($row = $result->fetch_assoc()) {
       array_push($locations, $row['tLocation']);
     }
   }

   // Close database connection
   $conn->close();

   // Return the training locations as a JSON array
   echo json_encode($locations);
?>
