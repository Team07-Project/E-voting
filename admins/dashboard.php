<?php
	ob_start();

	session_start();
	if (!isset($_SESSION['id_admin'])) {
	   header('location: ./');
	}
	define('BASEPATH', dirname(__FILE__));

	include('../include/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>E-Voting Dashboard &mdash; Osis</title>

  <!-- General CSS Files -->
  <link rel="icon" href="../images/almadani.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/hover-min.css">
  <link rel="stylesheet" href="assets/css/all.min.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link href="assets/table/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <style>
  #data , img{
    max-width: 100%;
    height: 200px;
    float : center;
    border-radius : 5px; 
   }
  .iamg {
	  height: 500px;
   }
  img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
	}
  #myInput {
    background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
  }

  #myTable {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ddd;
  }

  #myTable th, #myTable td {
    text-align: left;
    padding: 12px;
  }

  #myTable tr {
    border-bottom: 1px solid #ddd;
  }

  #myTable tr.header, #myTable tr:hover {
    background-color: #f1f1f1;
  }
  li {
	  list-style:none;
  }
  </style>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
		<ul>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
			<i class="fas fa-user"></i>
            <div class="d-sm-none d-lg-inline-block">T E A M 7</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="?page=edit_profil" class="dropdown-item has-icon">
                <i class="fas fa-edit"></i> Edit Profile
              </a>
              <a href="?page=change_password" class="dropdown-item has-icon">
                <i class="fas fa-key"></i> Ganti Password
              </a>
              <div class="dropdown-divider"></div>
              <a href="?page=logout" class="dropdown-item has-icon text-danger confirmation">
                <i class="fas fa-sign-out-alt"></i> Sign Out
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">AMG E-Voting</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">AMG</a>			
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown " <?php if (!isset($_GET['page'])) { echo 'class="active"';}?>>
                <a href="./" class="nav-link text-primary"><i class="fas fa-fire text-primary"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Manajemen</li>
              <li class="nav-item dropdown " <?php if (isset($_GET['page']) && $_GET['page'] == 'user') { echo 'class="active"'; } ?>>
                <a href="?page=user" class="nav-link text-primary"><i class="fas fa-users text-primary"></i><span>Manajemen User</span></a>
              </li>
              <li class="nav-item dropdown " <?php if (isset($_GET['page']) && $_GET['page'] == 'kandidat') { echo 'class="active"'; } ?>>
                <a href="?page=kandidat" class="nav-link text-primary"><i class="fas fa-user text-primary"></i><span>Manajemen Kandidat</span></a>
              </li>
              <li class="nav-item dropdown " <?php if (isset($_GET['page']) && $_GET['page'] == 'kelas') { echo 'class="active"'; } ?>>
                <a href="?page=kelas" class="nav-link text-primary"><i class="fas fa-school text-primary"></i><span>Manajemen Kelas</span></a>
              </li>
              <!--<li class="menu-header">Hasil</li>-->
              <!--<li class="nav-item dropdown " <?php if (isset($_GET['page']) && $_GET['page'] == 'about') { echo 'class="active"'; } ?>>-->
              <!--  <a href="?page=perolehan" class="nav-link text-primary"><i class="fas fa-chart text-primary"></i><span>Perolehan</span></a>-->
              <!--</li>-->
              <li class="menu-header">About</li>
              <li class="nav-item dropdown " <?php if (isset($_GET['page']) && $_GET['page'] == 'about') { echo 'class="active"'; } ?>>
                <a href="?page=about" class="nav-link text-primary"><i class="fas fa-users text-primary"></i><span>About Us</span></a>
              </li>
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
	        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Sign Out</h4>
                </div>
                <div class="modal-body">
                  Apakah anda yakin ingin keluar dari aplikasi ini?
                </div>
                <div class="modal-footer">
                  <a href="?page=logout" class="btn btn-danger">Sign Out</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        <section class="section">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
              <?php
                  if(isset($_GET['page'])) {
                      switch ($_GET['page']) {
                        case 'user':
                            include('./user/index.php');
                            break;
                        case 'kelas':
                            include('./kelas/index.php');
                            break;
                        case 'kandidat':
                            include('./kandidat/index.php');
                            break;
                        case 'user':
                            include('./user/index.php');
                            break;
                        case 'perolehan':
                            include('./perolehan.php');
                            break;
                        case 'about':
                            include('about.php');
                            break;
                        case 'edit_profil':
                            include('./edit.php');
                            break;
                        case 'change_password':
                            include('./pass.php');
                            break;
                        case 'logout':
                            unset($_SESSION['id_admin']);
                            unset($_SESSION['user']);

                            header('location:./');
                            break;
                        default:
                            include('./welcome.php');
                            break;
                      }
                  } else {
                      include('./welcome.php');
                  }
                  ?>

              </div>
            </div>
        </section>
      </div>
      <footer class="main-footer" style="margin-top: 0px;">
        <div class="footer-left">
			<strong>Copyright &copy; 2019-2020 <a href="">RPL SMK AL-MADANI GARUT</a>.</strong> All rights reserved. Powered by : <a href="">REKAYASA PERANGKAT LUNAK        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- jQuery 2.2.3 -->
    <script src="../assets/js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/app.min.js"></script>
    <?php if (isset($_GET['page']) && $_GET['page'] == 'perolehan') { ?>
    <script type="text/javascript" src="../assets/js/chart-bundle.js"></script>
    <script type="text/javascript" src="../assets/js/utils.js"></script>
    <script type="text/javascript" src="../assets/js/FileSaver.min.js"></script>
    <script type="text/javascript" src="../assets/js/canvas-toBlob.js"></script>
    <?php } ?>
    <script type="text/javascript">
    // slideToggle()
    $(document).ready(function() {
      $(".dropdown-toggle").click(function() {
          $(this).parent().find(".dropdown-menu").slideToggle();
      });
      $("#menu-toggle").click(function() {
          $(this).parent().find(".menu").slideToggle();
      });
    });

    $("#save-img").click(function(){
      $('#canvas').get(0).toBlob(function(blob){
          saveAs(blob, 'chart.png');
      });
    });
    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'kandidat') { ?>
      function tampil() {
          $.ajax({
            url: 'ajax.php',
            method: "GET",
            success: function(data) {
              $('#data').html(data);
            }
          });
      }

      $(document).ready(function(){
          $('#periode').change(function(){
            var periode = $('#periode').val();

            $.ajax({
              url: "ajax.php",
              method: "POST",
              data: {periode : periode},
              success: function(data) {
                $('#data').html(data);
              }
            });
          });
      });

      window.onload = function(){
          tampil();
      };
      <?php
    }
    ?>
    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'perolehan') {
      $thn = date('Y');
      $dpn = date('Y') + 1;
      $periode = $thn.'/'.$dpn;
	  $d = mysqli_query($koneksi,"select count(id_user) As jumlah from t_user");
      $kan = $koneksi->prepare("SELECT * FROM t_kandidat WHERE periode = ?") or die($con->error);
      $kan->bind_param('s', $periode);
      $kan->execute();
      $kan->store_result();
      $numb = $kan->num_rows();
      $label = '';
      $data = '';
      for ($i = 1; $i <= $numb; $i++) {
          $kan->bind_result($id, $nama, $foto, $visi, $misi, $suara, $kandidat, $program, $no_k);
          $kan->fetch();
          $label .= "'".$nama."',";
          $data .= $suara.',';
      }
      $labels = trim($label, ',');
      $datas  = trim($data, ',');
    ?>
    var chartData = {
      labels: [
          <?php
          echo $labels;
          ?>
      ],
        datasets: [{
          type: 'bar',
          label: 'Jumlah Suara',
          borderColor: window.chartColors.BLACK,
          backgroundColor: [
            window.chartColors.yellow,
            window.chartColors.red,
            window.chartColors.blue,
            window.chartColors.green,
          ],
          borderWidth: 2,
          fill: false,
          data: [
            <?php
            echo $datas;
            ?>
          ]
        }],
    };
    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myMixedChart = new Chart(ctx, {
          type: 'bar',
          data: chartData,
          options: {
                responsive: true,
                title: {
                  display: true,
                  text: 'Perolehan Suara',
                  fontSize: 30
                },
                legend: {
                    labels: {
                        fontSize: 20
                    }
                },
                scales: {
                  xAxes: [{
                      ticks: {
                          fontSize:15
                      }
                  }],
                  yAxes: [{
                      ticks: {
                          fontSize:14,
                          min:0
                      }
                  }]
                }
            }
        });
    };
    <?php
    }
    ?>
    </script>
	<!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Apakah anda yakin?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
 
  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/table/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/table/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->

  <!-- Page level plugins -->
  <script src="assets/table/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/table/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/table/js/demo/datatables-demo.js"></script>
  
	</body>
</html>
<?php ob_flush(); ?>