<?php
    include "header.php";
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims480";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);


?>
<html>
<head>
    <title></title>
</head>
<body>
    <div class="container">
    <h5>Stock Status</h5>
    <table class="table table-striped">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Unit</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
      <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
               <tr>
                <!--<th scope="row"></th>-->
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["des"] ?></td>
                <td><?php echo $row["unit"] ?></td>
                <td><?php echo $row["unit_price"] ?></td>
                <td>Update / Delete</td>
                </tr>
                <?php }
        } else {
            echo "0 results";
        }
        ?>
      

    
  </tbody>
</table>
</div>
</body>
</html>