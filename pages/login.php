<?php
  session_start();
  if (isset($_SESSION['ID'])) {
      header("Location:../index.php");
      exit();
  }
  // Include database connectivity
    
  include_once('../conf/conn.php');

  
  if (isset($_POST['submit'])) {

    $errorMsg = "";

    $username = $koneksi->real_escape_string($_POST['username']);
    $password = $koneksi->real_escape_string($_POST['password']);
    
if (!empty($username) || !empty($password)) {
      $query  = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
      $result = $koneksi->query($query);
      if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          $_SESSION['ID'] = $row['id'];
          $_SESSION['ROLE'] = $row['role'];
          $_SESSION['NAME'] = $row['name'];
          $_SESSION['IMG'] = $row['img'];
          header("Location:../index.php");
          die();                              
      }else{
        $errorMsg = "Username/Password not found on this site";
      } 
  }else{
    $errorMsg = "Username and Password is required";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CSS Unite | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
   <!-- Toastr -->
   <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">


  

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>CSS</b> UNITE</a>
  </div>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
      <?php } ?>


      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Enter Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Enter Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" value="Login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php

?>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<script type="text/javascript" src="../plugins/jquery/jquery-3.5.1.js"></script>



</body>
</html>
