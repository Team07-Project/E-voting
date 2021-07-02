<?php
session_start();

if (isset($_SESSION['id_admin'])) {
  header('location: ./dashboard.php');
}

if (isset($_POST['submit'])) {
  define('BASEPATH', dirname(__FILE__));
  include('../include/connection.php');

  $user = $_POST['username'];
  $pass = mysqli_real_escape_string($con, $_POST['pass']);

  if ($user == null || $pass == null) {

    echo '<script type="text/javascript">alert("Username / Password tidak boleh kosong");</script>';
  } else {

    $log = $con->prepare("SELECT * FROM t_admin WHERE username = ?") or die($con->error);
    $log->bind_param('s', $user);
    $log->execute();
    $log->store_result();
    $jml = $log->num_rows();
    $log->bind_result($id, $username, $fullname, $password);
    $log->fetch();

    if ($jml > 0) {

      if (password_verify($pass, $password)) {

        $_SESSION['id_admin']   = $id;
        $_SESSION['user']       = $fullname;

        header('location:./dashboard.php');
      } else {

        echo '<script type="text/javascript">alert("Password Salah");</script>';
      }
    } else {

      echo '<script type="text/javascript">alert("Username tidak dikenali");</script>';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; E-Voting</title>

  <!-- General CSS Files -->
  <link rel="icon" href="../images/almadani.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <!-- Template CSS -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="../images/almadani.png" alt="logo" width="70" class="shadow-light rounded-circle mb-5 mt-2">
            <img src="../images/rpl.png" alt="logo" width="70" class="shadow-light mb-5 mt-2">
            <img src="../images/otkp.png" alt="logo" width="70" class="shadow-light mb-5 mt-2">
            <img src="../images/ph.png" alt="logo" width="70" class="shadow-light mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat Datang <span class="font-weight-bold">Admin</span></h4>
            <p class="text-muted">Sebelum memulai, Anda harus masuk atau mendaftar jika Anda belum memiliki akun.</p>
            <form method="post" action="">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" autocomplete='off' autofocus name="username" placeholder="Masukan Username">
                <div class="invalid-feedback">
                  Please fill in your username
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label>Password</label>
                </div>
                <input type="password" class="form-control" name="pass" placeholder="Masukan Password">
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              <div class="form-group text-right">
                <a href="auth-forgot-password.html" class="float-left mt-3">

                </a>
                <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

            </form>

            <div class="text-center mt-5 text-small">
              Developer @Team RPL SMK AL-MADANI 20<?php echo date('y'); ?>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../images/1 - Copy.jpg" style="background-image: url('../images/waw - Copy.jpg');">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold"><?php

                                                            date_default_timezone_set("Asia/Jakarta");

                                                            $b = time();
                                                            $hour = date("G", $b);

                                                            if ($hour >= 0 && $hour <= 11) {
                                                              echo "Selamat Pagi";
                                                            } elseif ($hour >= 12 && $hour <= 14) {
                                                              echo "Selamat Siang ";
                                                            } elseif ($hour >= 15 && $hour <= 17) {
                                                              echo "Selamat Sore ";
                                                            } elseif ($hour >= 17 && $hour <= 18) {
                                                              echo "Selamat Petang  ";
                                                            } elseif ($hour >= 19 && $hour <= 23) {
                                                              echo "Selamat Malam ";
                                                            }

                                                            ?></h1>
                <h5 class="font-weight-normal text-muted-transparent">SMK AL-MADANI GARUT</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="#">Mulki Anaz Aliza</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="scripts.js"></script>
  <script src="custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
