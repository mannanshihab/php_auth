<?php 
 session_start();
  if(array_key_exists('is_authenticated', $_SESSION) && $_SESSION['is_authenticated']==true):
    header('location:http://localhost/PHP/backend/admin/index.php' );
  endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="dist/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-white text-dark py-5">
<?php
 include_once ($_SERVER ['DOCUMENT_ROOT']."/PHP/config.php");
 ?>
<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <h3><i class="fa fa-user"></i> Login Admin</h3>
                <?php
                    if(isset($_GET['error'])){ ?>
                        <p class="alert alert-danger">Username or password doesn't match</p>
                <?php } ?>
                <form method="post" 
                      action="<?=$webroot?>admin/login-processor.php">
                    <div class="form-group">
                        <label for="input-name">Name</label>
                        <input
                                type="text"
                                class="form-control"
                                id="input-name"
                                name="name"
                                value=""
                                placeholder="Enter User name" required>
                    </div>
                    <div class="form-group">
                        <label for="input-password">Password</label>
                        <input
                                type="password"
                                class="form-control"
                                id="input-password"
                                name="password"
                                value=""
                                placeholder="Enter password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
