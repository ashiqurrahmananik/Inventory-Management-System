<?php
    include "header.php";
    include "connection.php";

$sql = "SELECT * FROM headoffice";
$result = mysqli_query($conn, $sql);
$data_sql = "SELECT * FROM book RIGHT JOIN headoffice ON book.book_id=headoffice.book_id";
$data = mysqli_query($conn, $data_sql);

if(isset($_POST['insert_btn'])){
  $insert_book_id = $_POST['insert_book_id'];
  $insert_stock = $_POST['insert_stock'];

  $inserting_query = "INSERT INTO headoffice (book_id, stock) VALUES ('$insert_book_id', '$insert_stock')";
  $insert_query = mysqli_query($conn, $inserting_query);
  if($insert_query){
     header('location:headoffice.php');
  }
}

if(isset($_POST['update_btn'])){
  $update_book_id = $_POST['book_id'];
  $stock = $_POST['stock'];

  $query = "UPDATE headoffice SET stock='$stock' WHERE book_id = '$update_book_id'";
  $update_query = mysqli_query($conn, $query);
  if($update_query){
     header('location:headoffice.php');
  }
};

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM headoffice WHERE book_id = '$remove_id'");
  header('location:headoffice.php');
};


?>

<html>
<head>
    <title>Head Office | PIMS</title>
</head>
<body>
    <div class="container">
    <h5>Stock Status @ Head Office</h5>
    <table class="table table-striped">
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
                <td><button type="submit" class="btn btn-primary" name="insert_btn">Insert</button></td>
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
                <td><input type="text" name="stock"  value="<?php echo $row['stock'];?>"></td>

                <td><button type="submit" class="btn btn-primary" name="update_btn">Update</button></td>
                <!-- <td><a class="btn btn-primary" href="stock.php?remove=<?php echo $row['book_id']; ?>">Delete</a></td> -->
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