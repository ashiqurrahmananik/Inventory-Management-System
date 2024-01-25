<!DOCTYPE html>
<?php
    include "../includes/header.php";
    include "../includes/connection.php";

$sql = "SELECT * FROM book";
$result = mysqli_query($conn, $sql);


if(isset($_POST['insert_btn'])){
  $insert_book_id = $_POST['insert_book_id'];
  $insert_book_name = $_POST['insert_book_name'];
  $insert_book_author = $_POST['insert_book_author'];
  $insert_book_price = $_POST['insert_book_price'];
  $insert_book_category = $_POST['insert_book_category'];

  $inserting_query = "INSERT INTO book (book_name, book_author, book_price, book_category) VALUES ('$insert_book_name', '$insert_book_author', '$insert_book_price', '$insert_book_category')";
  $insert_query = mysqli_query($conn, $inserting_query);
  if($insert_query){
     header('location:book.php');
  }
}

if(isset($_POST['update_btn'])){
  $update_book_id = $_POST['book_id'];
  $book_name = $_POST['book_name'];
  $book_author = $_POST['book_author'];
  $book_price = $_POST['book_price'];
  $book_category = $_POST['book_category'];

  $query = "UPDATE book SET book_name = '$book_name', book_author='$book_author', book_price='$book_price', book_category='$book_category' WHERE book_id = '$update_book_id'";
  $update_query = mysqli_query($conn, $query);
  if($update_query){
     header('location:book.php');
  }
};

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM book WHERE book_id = '$remove_id'");
  header('location:book.php');
};

?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book | PIMS</title>
    
    <!-- Style Sheet -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <br>
    <div class="container-fluid">
    <h5>Book List</h5>
    <br>
    <div class="scrollme">
    <table class="table table-striped table-hover table-responsive align-middle width:100% display nowrap">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Book ID</th>
      <th scope="col">Name</th>
      <th scope="col">Author</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               <tr>
                <input type="hidden" name="insert_book_id"  value="">
                <td>#</td>
                <td><input type="text" name="insert_book_name"  value=""></td>
                <td><input type="text" name="insert_book_author"  value=""></td>
                <td><input type="number" name="insert_book_price"  value=""></td>
                <td><input type="text" name="insert_book_category"  value=""></td>
                <td><button type="submit" class="btn btn-success" name="insert_btn">Insert</button></td>
               </tr>
              </form>
  </thead>
  <tbody>
       
  <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               <tr>
                <input type="hidden" name="book_id"  value="<?php echo $row['book_id'];?>">
                <td><label for="book id"><?php echo $row['book_id'];?></label></td>
                <td><input type="text" name="book_name"  value="<?php echo $row['book_name'];?>"></td>
                <td><input type="text" name="book_author"  value="<?php echo $row['book_author'];?>"></td>
                <td><input type="number" name="book_price"  value="<?php echo $row['book_price'];?>"></td>
                <td><input type="text" name="book_category"  value="<?php echo $row['book_category'];?>"></td>
                <td><button type="submit" class="btn btn-warning" name="update_btn">Update</button></td>
                <td><a class="btn btn-danger" href="book.php?remove=<?php echo $row['book_id']; ?>">Delete</a></td>
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