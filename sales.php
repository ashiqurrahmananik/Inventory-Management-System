<?php
    include "header.php";
    include "connection.php";
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

if (isset($_POST['submit'])) 
{
$id=$_POST['id'];
$name=$_POST['name'];
$des=$_POST['des'];
$unit=$_POST['unit'];
$unitprice=$_POST['unitprice'];
$unitsale=$_POST['unitsale'];
$totalprice=$unitprice*$unitsale;
$u_unit=$unit-$unitsale;

if($unit>=$unitsale)
{
  $insertsql = "INSERT INTO sales(name, sellunit, totalprice, productid) VALUES ('$name', '$unitsale', '$totalprice','$id')";

if ($conn->query($insertsql) === TRUE) 
{
  echo " Sell successfully";
} 
else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$update_quantity_query = "UPDATE `product` SET unit = '$u_unit'  WHERE id = '$id'";

if ($conn->query($update_quantity_query) === TRUE) 
{
  echo " Update successfully";
} 
else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header('location:sales.php');

}
else
{
  echo "Out Of Stock";
}



};




?>
<html>
<head>
    <title></title>
</head>
<body>
    <div class="container">
    <h5>Sales</h5>
    <table class="table table-striped">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Unit</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Sell Unit</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
      <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
             <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
               <tr>
               <input type="hidden" name="id"  value="<?php echo $row['id'];?>">
                <input type="hidden" name="name"  value="<?php echo $row['name'];?>">
                <input type="hidden" name="des"  value="<?php echo $row['des'];?>">
               <input type="hidden" name="unit"  value="<?php echo $row['unit'];?>">
                <input type="hidden" name="unitprice"  value="<?php echo $row['unitprice'];?>">
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['des'];?></td>
                <td><?php echo $row['unit'];?></td>
                <td><?php echo $row['unitprice'];?></td>
                <td><div class="mb-3">
                    <input type="number" name="unitsale" class="form-control" id="exampleInputUnit">
               </div></td>
                <td><button type="submit" class="btn btn-primary" name="submit">Sell Now</button></td>
                </tr>
                </form>
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