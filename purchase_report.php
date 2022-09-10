<?php
    include "header.php";
    include "connection.php";
    $t=0;
if (isset($_POST['submit'])) 
{
    $starttime=$_POST['starttime'];
    $endtime=$_POST['endtime'];

$sql = "SELECT * FROM purchase where created_at>='$starttime' && created_at<'$endtime'";
$res = $conn -> query ($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="starttime">Start (date and time):</label>
  <input type="datetime-local" id="starttime" name="starttime">

  <label for="endtime"> End (date and time):</label>
  <input type="datetime-local" id="endtime" name="endtime">
  <input type="submit" name="submit">
</form>
<button type="button" onclick="window.print();return false;">Pdf Report</button>
<h5>Purchase Report</h5>
<table class="table table-striped">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Product Name</th>
      <th scope="col">Unit</th>
      <th scope="col">Total Unit Price</th>
    </tr>
  </thead>
  <tbody>
 <?php
 if(isset($_POST['submit']))
 {
          if (mysqli_num_rows($res) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($res)) {
                $t=$t+($row['unit']*$row['unitprice']);
              ?>
               <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['unit'];?></td>
                <td><?php echo $row['unit']*$row['unitprice'];?></td>

                </tr>
                </form>
                <?php
                 }
        } 
        else 
        {
            echo "0 results";
        }
    }
        ?>
    </tbody>
</table>
<?php echo "Total= " . $t ." Taka";?>
</div>
</body>
</html>
