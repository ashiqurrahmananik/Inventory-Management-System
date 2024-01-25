<!DOCTYPE html>
<?php
  include "../includes/header.php";
  include "../includes/connection.php";
  
  $sql = "SELECT * FROM sales";
  $result = mysqli_query($conn, $sql);

// invoice_id 	book_id 	sales_date 	quantity 	transaction_amount

  if(isset($_POST['insert_btn'])){
    $insert_invoice_id = $_POST['insert_invoice_id'];
    $insert_book_id = $_POST['insert_book_id'];
    $insert_sales_date = $_POST['insert_sales_date'];
    $insert_quantity = $_POST['insert_quantity'];

    $price_query = "SELECT book_price FROM book WHERE book_id = '$insert_book_id'";
    $price_result = mysqli_query($conn, $price_query);

    $row = $price_result->fetch_row();
    $price = $row[0];

    $calculated_transaction_amount = $price * $insert_quantity;
    $insert_transaction_amount = $calculated_transaction_amount;

    $inserting_query = "INSERT INTO sales(book_id, sales_date, quantity, transaction_amount) VALUES ('$insert_book_id', '$insert_sales_date', '$insert_quantity','$insert_transaction_amount')";
    $insert_query = mysqli_query($conn, $inserting_query);
    if($insert_query){
      header('location:../redirects/redirecing_sales.php');
    }
  }

  if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM sales WHERE invoice_id = '$remove_id'");
    header('location:../redirects/redirecing_sales.php');
  }

?>

<html>
<head>
    <title>Sales | PIMS</title>
</head>
<body>
    <div class="container-fluid">
    <h5>Sales</h5>
    <br>
    <div class="scrollme">
    <table class="table table-striped table-hover table-responsive align-middle width:100% display nowrap">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Invoice ID</th>
      <th scope="col">Book ID</th>
      <th scope="col">Sales Date</th>
      <th scope="col">Quantity</th>
      <th scope="col">Transaction Amount</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               <tr>
                <input type="hidden" name="insert_invoice_id"  value="">
                <td></td>
                <td><input type="number" name="insert_book_id"  value=""></td>
                <td><input type="date" name="insert_sales_date"  value=""></td>
                <td><input type="number" name="insert_quantity"  value=""></td>
                <td><!-- <input type="number" name="insert_transaction_amount"  value=""> --></td>
                <td colspan="2"><button type="submit" class="btn btn-success" name="insert_btn">Insert</button></td>
               </tr>
              </form>
  
   
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
                <!-- <td><button type="submit" class="btn btn-warning" name="update_btn">Update</button></td> -->
                <td><a class="btn btn-danger" href="sales.php?remove=<?php echo $row['invoice_id']; ?>">Delete</a></td>
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