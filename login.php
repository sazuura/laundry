<?php 

include "include/koneksi.php";
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>
  <link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Salma</b>Laundry</a>
      <img src="images/logo.png" alt="laundry Logo" width="160" height="160">
    </div>
    <div class="card-body">
      
      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pass" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php 

    if (isset($_POST['login'])) {
       $username= $_POST['username'];
       $pass= $_POST['pass'];

       $sql = $koneksi->query("SELECT * FROM tb_user where username='$username' and password='$pass'");
       $data = $sql->fetch_assoc();
       $ketemu = $sql->num_rows;

       if ($ketemu >= 1) {

        session_start();

        if ($data['level']=="admin") {
           $_SESSION['admin'] = $data['id'];

           header("location:index.php");
        }
        else if ($data['level']=="kasir") {
            $_SESSION['kasir'] = $data['id'];
 
            header("location:index.php");
         }
        }else{
            ?>
            <script type="text/javascript">
                alert("Login Gagal Username dan Password Salah... Silakan Ulangi Lagi");
            </script>
            <?php
         }
       }
    

?>