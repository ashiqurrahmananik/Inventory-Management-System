<!DOCTYPE html>
<?php
 SESSION_START();

 if(isset($_SESSION['auth']))
 {
    if($_SESSION['auth']!=1)
    {
        header("location:login.php");
    }
 }
 else
 {
    header("location:login.php");
 }
?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Publishers Information Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../book/book.php">Book</a>
        </li>
        <li class="nav-item">
        <div class="dropdown show">
        <a class="nav-link btn dropdown-toggle" href="../stock/stock.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Stock</a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="nav-link dropdown-item" href="../stock/centralstore.php">Central Stock</a>
          <a class="nav-link dropdown-item" href="../stock/headoffice.php">Head Office Stock</a>
          <a class="nav-link dropdown-item" href="../stock/outlet.php">Outlet</a>
        </div>
    </div>
        <!--  <a class="nav-link" href="stock.php">Stock</a> -->
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="purchase.php">Purchase</a>
        </li>
        -->
        <li class="nav-item">
          <a class="nav-link"  href="../sales/sales.php">Sales</a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link"  href="purchase_report.php">Purchase Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="sales_report.php">Sales Report</a>
        </li>
        -->
        <li class="nav-item">
          <a class="nav-link" style="color:red!important;"  href="../includes/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>