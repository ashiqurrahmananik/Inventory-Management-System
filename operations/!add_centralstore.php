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
      header('location:redirecting_add_centralstore.php');
    }

  } else{
      $inserting_query = "INSERT INTO centralstore (book_id, stock) VALUES ('$insert_book_id', '$insert_stock')";
      $insert = mysqli_query($conn, $inserting_query);
      if($insert){
        header('location:redirecting_add_centralstore.php');
      }
  }
} else{
  header('location:redirecting_add_centralstore.php');
}


?>

<html>
<head>
    <title>Central Store | PIMS</title>
</head>
<body>
    <div class="container-fluid">
    
    <br>
    <div class="scrollme d-flex justify-content-center">
    <table class="table table-striped table-hover table-responsive align-middle width:100% display text-nowrap text-center w-auto">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <tbody>
      <tr>
        <th colspan="2"><h5 class="d-flex justify-content-center">Stock Update @ Central Store</h5></th>
      </tr>
      <tr>
        <th scope="col">Book ID</th>
        <td><input type="text" name="insert_book_id"  value=""></td>
      </tr>

      <tr>
        <th scope="col">Stock</th>
        <td><input type="text" name="insert_stock"  value=""></td>
      </tr>
      <tr>
        <td colspan="2"><button type="submit" class="btn btn-success" name="insert_btn">Insert</button></td>
      </tr>
    </tbody>
    </form>
    </table>
    </div>
    </div>
</body>
</html>