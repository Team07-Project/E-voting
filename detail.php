<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Profil Calon ~ E - Voting</title>
      <link rel="icon" href="images/almadani.png">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">      <style type="text/css">
         body::before {
		  content: "";
		  display: block;
		  position: absolute;
		  z-index: -1;
		  width: 100%;
		  height: 100%;
		  top: 0;
		  left: 0;
		  background: aqua;
		  background: -webkit-linear-gradient(top, aqua, grey);
		  background: -o-linear-gradient(top, aqua, grey);
		  background: -moz-linear-gradient(top, aqua, grey);
		  background: linear-gradient(top, aqua, grey);
		  opacity: 0.9; 
		 }
		 body::{
		  width: 100%;  
		  min-height: 100vh;
		  display: -webkit-box;
		  display: -webkit-flex;
		  display: -moz-box;
		  display: -ms-flexbox;
		  display: flex;
		  flex-wrap: wrap;
		  justify-content: center;
		  align-items: center;
		  padding: 15px;
		  background-repeat: no-repeat;
		  background-size: cover;
		  background-position: center;
		  
		  position: relative;
		  z-index: 1;
		}
         .img {
            max-height: 250px;
            max-width: 250px;
            height:100%
         }
		  hr {
			  margin-left : 500px;
			  margin-right : 500px;
		  }
.flip-card {
  background-color: transparent;
  width: 350px;
  height: 425px;
  border: 1px solid #f1f1f1;
  border-radius : 4%;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #fff;
  color: black;
}

/* Style the back side */
.flip-card-back {
   background: transparent;
  color: white;
  text-shadow : 2px 2px 2px black;
  transform: rotateY(180deg);
}
.tablink {
  background-color: transparent;
  color: white;
  text-shadow: 1px 1px 1px black;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
		  background: #0fabbc;
		  border-radius: 20px;
}

/* Style the tab content */
.tabcontent {
  color: white;
  text-shadow: 1px 1px 1px black;
  display: none;
  padding: 50px;
  text-align: center;
}

#London {background-color:transparent;}
#Paris {background-color:transparent;}
#Tokyo {background-color:transparent;}
#Oslo {background-color:transparent;}

      </style>
   </head>
   <body style="background-image: url('images/waw.jpg');background-size: 1500px 700px;">
      <div class="container">
         <div class="text-center" style="padding-top:20px; color:#eee;">
            <h2 style='text-shadow:2px 2px 2px black;'>PROFILE CANDIDATE OSIS</h2>
         </div>
         <hr class="bg-white" />

         <?php
         define('BASEPATH', dirname(__FILE__));
         session_start();

         if(!isset($_SESSION['siswa'])) {
            header('location:./');
         }

         if(isset($_GET['id'])) {

            require('./include/connection.php');

            $sql = $con->prepare("SELECT * FROM t_kandidat WHERE id_kandidat = ?") or die($con->error);
            $sql->bind_param('i', $_GET['id']);
            $sql->execute();
            $sql->store_result();
            $sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode, $program, $no_k);
            $sql->fetch();
			
			$nomi = 1;
            ?>
       <!--     <div class="row">
               <div class="col-md-10 col-md-offset-1">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="text-center">
                           <img src="./assets/img/kandidat/" class="img-responsive">
                        </div>
                     </div>

                     <div class="col-md-8">
                        <h3 style="color:#eee" class="font-weight-bold">Informasi Calon</h3>
                        <table class="table table-striped" style="background: #fff;">
                           <tr>
                              <td width="200px">Nama Calon</td>
                              <td>: <?php echo $nama; ?></td>
                           </tr>
                           <tr>
                              <td>Visi</td>
                              <td>: <?php echo nl2br($visi); ?></td>
                           </tr>
                           <tr>
                              <td>Misi</td>
                              <td>: <?php echo nl2br($misi); ?></td>
                           </tr>
                           <tr>
                              <td>Total Perolehan Suara</td>
                              <td>: <?php echo $suara; ?> Suara</td>
                           </tr>
                           <tr>
                              <td>Periode Pencalonan</td>
                              <td>: <?php echo $periode; ?></td>
                           </tr>
                        </table>
                        <div>
                           <button onclick="window.history.go(-1)" class="btn btn-warning">Kembali</button>
                           <a href="./submit.php?id=<?php echo $id; ?>&s=<?php echo $suara; ?>" class="btn btn-success">Beri Suara</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <?php

         } else {

            header('location: ./');

         }
         ?>
      </div>
   </body>
</html> -->
  <div class="row no-gutters lol">
    <div class="col-md-4">
	<div class="flip-card">
	  <div class="flip-card-inner">
		<div class="flip-card-front">
		  <img src="./assets/img/kandidat/<?php echo $foto; ?>" alt="Avatar" style="border-radius:4%; width:350px;height:425px;">
		</div>
		<div class="flip-card-back">
		  <h1 class="mt-3" style='margin-bottom:60px;'>NO KANDIDAT</h1>
		  <h1 class="" style='font-size:100px; margin-bottom:95px;'><?php echo $no_k; ?></h1>
		  <h1 class=""><?php echo $nama; ?></h1>
		</div>
	  </div>
	</div>
    </div>
	
    <div class="col-md-8">
<div id="London" class="tabcontent">
  <h1>SELAMAT DATANG DI</h1>
  <p>PEMILIHAN OSIS PERIODE 2020/2025</p>
</div>

<div id="Paris" class="tabcontent">
  <h1 style="text-align:left!important;">VISI</h1>
  <p style="text-align:left!important;"><?php echo nl2br($visi)?></p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h1 style="text-align:left!important;">MISI</h1>
  <p style="text-align:left!important;"><?php echo nl2br($misi)?></p>
</div>

<div id="Oslo" class="tabcontent" style="justify-content: center!important;">
  <h1 style="text-align:left!important;">PROGRAM</h1>
  <p style="text-align:left!important;">
<?php echo nl2br($program)?>
  </p>
</div>

<button class="tablink " onclick="openCity('London', this, 'transparent')" id="defaultOpen">HOME</button>
<button class="tablink" onclick="openCity('Paris', this, 'transparent')">VISI</button>
<button class="tablink" onclick="openCity('Tokyo', this, 'transparent')">MISI</button>
<button class="tablink " onclick="openCity('Oslo', this, 'transparent')">PROGRAM</button>

		<div>
                           <button onclick="window.history.go(-1)" class="btn btn-success shadow mt-3 ml-3 rounded-pill">Kembali</button>
                           <a href="./submit.php?id=<?php echo $id; ?>&s=<?php echo $suara; ?>" class="mt-3 btn btn-dark rounded-pill shadow">Beri Suara</a>
                        </div>
  </div>
  </div>
<script>
function openCity(cityName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(cityName).style.display = "block";
  elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>