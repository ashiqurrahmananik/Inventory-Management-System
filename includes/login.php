<!DOCTYPE html>
<?php 

SESSION_START();

if(isset($_SESSION['auth']))
{
    if($_SESSION['auth']==1)
    {
        header("location:../book/book.php");
    }
}


    if (isset($_POST['submit'])) 
    {
        $id = $_POST['id'];
        $pass = ($_POST['password']);

        if($id=='admin' && $pass=='admin')
        {
            $_SESSION['auth']=1;
            header("location:../book/book.php");
        }

        else
        {
            echo "invalid";
        }

    }


?>

<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Sign in | PIMS</title>

</head>
<body>
<div class="container-fluid">
    <br>
    <div class=""> <br>
        <h2 class="d-flex justify-content-center">Publishers Information Management System</h2> <br>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h3>Sign In</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-group form-group">
                        <input type="text" class="form-control" placeholder="username" name="id">
                    </div>
                    <br>
                    <div class="input-group form-group">
                        <input type="password" class="form-control align-middle" placeholder="password" name="password">
                    </div>
                    <br>
                    <div class="form-group submit-btn d-flex justify-content-center">
                        <input type="submit" value="Login" class="btn btn-primary" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>