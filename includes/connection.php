<?php  //$servername = "localhost"; $username = "sakib_pub-mgmt"; $password = "#Password007"; $dbname = "sakib_pub-mgmt";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>