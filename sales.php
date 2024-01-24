<?php
    include "header.php";
    include "connection.php";
$sql = "SELECT * FROM sales";
$result = mysqli_query($conn, $sql);

// invoice_id 	book_id 	sales_date 	quantity 	transaction_amount

if(isset($_POST['insert_btn'])){
  $insert_invoice_id = $_POST['insert_invoice_id'];
  $insert_book_id = $_POST['insert_book_id'];
  $insert_sales_date = $_POST['insert_sales_date'];
  $insert_quantity = $_POST['insert_quantity'];
  $insert_transaction_amount = $_POST['insert_transaction_amount'];

  $inserting_query = "INSERT INTO sales(book_id, sales_date, quantity, transaction_amount) VALUES ('$insert_book_id', '$insert_sales_date', '$insert_quantity','$insert_transaction_amount')";
  $insert_query = mysqli_query($conn, $inserting_query);
  if($insert_query){
     header('location:sales.php');
  }
}

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM sales WHERE invoice_id = '$remove_id'");
  header('location:sales.php');
};


?>
<html>
<head>
    <title>Sales | PIMS</title>
</head>
<body>
    <div class="container">
    <h5>Sales</h5>
    <table class="table table-striped">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Invoice ID</th>
      <th scope="col">Book ID</th>
      <th scope="col">Sales Date</th>
      <th scope="col">Quantity</th>
      <th scope="col">Transaction Amount</th>
      <th scope="col">Actions</th>
    </tr>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               <tr>
                <input type="hidden" name="insert_invoice_id"  value="">
                <td></td>
                <td><input type="number" name="insert_book_id"  value=""></td>
                <td><input type="date" name="insert_sales_date"  value=""></td>
                <td><input type="number" name="insert_quantity"  value=""></td>
                <td><input type="number" name="insert_transaction_amount"  value=""></td>
                <td><button type="submit" class="btn btn-primary" name="insert_btn">Insert</button></td>
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
                <input type="hidden" name="invoice_id"  value="<?php echo $row['invoice_id'];?>">
                <td><label><?php echo $row['invoice_id'];?></label></td>
                <td><label><?php echo $row['book_id'];?></label></td>
                <td><label><?php echo $row['sales_date'];?></label></td>
                <td><label><?php echo $row['quantity'];?></label></td>
                <td><label><?php echo $row['transaction_amount'];?></label></td>
                <td><a class="btn btn-primary" href="sales.php?remove=<?php echo $row['invoice_id']; ?>">Delete</a></td>
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