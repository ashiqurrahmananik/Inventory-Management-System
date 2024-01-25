<!DOCTYPE html>
<?php
    include "../includes/header.php";
    include "../includes/connection.php";

$sql = "SELECT * FROM centralstore";
$result = mysqli_query($conn, $sql);
$data_sql = "SELECT * FROM book RIGHT JOIN centralstore ON book.book_id=centralstore.book_id";
$data = mysqli_query($conn, $data_sql);

if(isset($_POST['insert_btn'])){
  $insert_book_id = $_POST['insert_book_id'];
  $insert_stock = $_POST['insert_stock'];

  $check_query = "SELECT book_id FROM centralstore WHERE book_id = '$insert_book_id'";
  $check = mysqli_query($conn, $check_query);


  if (mysqli_num_rows($check) > 0) {
    $update_book_id = $insert_book_id;
    $update_stock = $insert_stock;

    $updating_query = "UPDATE centralstore SET stock = (SELECT stock FROM centralstore WHERE book_id = '$update_book_id') + '$update_stock' WHERE book_id = '$update_book_id'";
    $update = mysqli_query($conn, $updating_query);
    if($update){
      header('location:../redirects/redirecting_centralstore.php');
    }

  } else{
      $inserting_query = "INSERT INTO centralstore (book_id, stock) VALUES ('$insert_book_id', '$insert_stock')";
      $insert = mysqli_query($conn, $inserting_query);
      if($insert){
        header('location:../redirects/redirecting_centralstore.php');
      }
  }
}

if(isset($_POST['update_btn'])){
  $update_book_id = $_POST['book_id'];
  $stock = $_POST['stock'];

  $query = "UPDATE centralstore SET stock='$stock' WHERE book_id = '$update_book_id'";
  $update_query = mysqli_query($conn, $query);
  if($update_query){
     header('location:../redirects/redirecting_centralstore.php');
  }
};

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM centralstore WHERE book_id = '$remove_id'");
  header('location:../redirects/redirecting_centralstore.php');
};


?>

<html>
<head>
    <title>Central Store | PIMS</title>
</head>
<body>
    <div class="container-fluid">
    <h5>Stock Status @ Central Store</h5>
    <br>
    <div class="scrollme">
    <table class="table table-striped table-hover table-responsive align-middle width:100% display nowrap">
    <thead>
      <tr>
        <th scope="col">Book ID</th>
        <th scope="col">Stock</th>
      </tr>
    </thead>
    <tbody>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               <tr>
                <td><input type="text" name="insert_book_id"  value=""></td>

                <td><input type="text" name="insert_stock"  value=""></td>
                <td><button type="submit" class="btn btn-success" name="insert_btn">Insert</button></td>
               </tr>
              </form>
    </tbody>
    </table>

    <table class="table table-striped">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Book ID</th>
      <th scope="col">Name</th>
      <th scope="col">Author</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Stock</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
   
      <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($data)) {
              ?>
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="book_id"  value="<?php echo $row['book_id'];?>">
                <td><label><?php echo $row['book_id'];?></label></td>
                <td><?php echo $row['book_name'];?></td>
                <td><?php echo $row['book_author'];?></td>
                <td><?php echo $row['book_price'];?></td>
                <td><?php echo $row['book_category'];?></td>
                <td><input type="text" name="stock" value="<?php echo $row['stock'];?>"></td>

                <td><button type="submit" class="btn btn-warning" name="update_btn">Update</button></td>
                <td><a class="btn btn-danger" href="centralstore.php?remove=<?php echo $row['book_id']; ?>">Delete</a></td>
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
</div>
</body>
</html>