<?php
    include "header.php";
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims480";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO product (name, des, unit, unit_price)
VALUES ('$_POST[name]', '$_POST[des]', '$_POST[unit]', '$_POST[unitprice]')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>