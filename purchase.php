<?php
    include "header.php";
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
        <h5>Purchase</h5>
    <form  action="purchase_action.php" method="post">
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputName">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputDes" class="form-label">Description</label>
    <input type="text" name="des" class="form-control" id="exampleInputDes">
  </div>
  <div class="mb-3">
    <label for="exampleInputUnit" class="form-label">Unit</label>
    <input type="number" name="unit" class="form-control" id="exampleInputUnit">
  </div>
  <div class="mb-3">
    <label for="exampleInputUnitprice" class="form-label">Unit Price</label>
    <input type="number" name="unitprice" class="form-control" id="exampleInputUnitprice">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</body>
</html>