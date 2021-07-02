<?php
define("BASEPATH", dirname(__FILE__));
session_start();
if(!isset($_SESSION['siswa'])) {
   header('location:./index.php');
}

?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>E - Voting</title>
      <link rel="icon" href="images/almadani.png">
      <link rel="stylesheet" href="./assets/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="./assets/css/animate.css"/>
      <style media="screen">
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
		 body{
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
		  .hr {
			  margin-left : 500px;
			  margin-right : 500px;
		  }
.card {
  max-width: 1000px;
  margin: auto;  
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border-color: aqua;
  outline: 0;
  display: inline-block;
  padding: 8px;
  background-color: transparent;
  color: white;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  border-radius: 5px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

img {
	border-radius: 5px;
}

button:hover, a:hover {
		  background: aqua;
		  background: -webkit-linear-gradient(top, aqua, grey);
		  background: -o-linear-gradient(top, aqua, grey);
		  background: -moz-linear-gradient(top, aqua, grey);
		  background: linear-gradient(top, aqua, grey);
		  opacity: 0.9; 
}

      </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body style="background-image: url('images/waw.jpg'); background-size: 1500px 700px;">
      <div class="container" >
         <center>
         <?php
         require('./include/connection.php');

         $thn     = date('Y');
         $dpn     = date('Y') + 1;
         $periode = $thn.'/'.$dpn;
		 $no = 1;
         $sql = $con->prepare("SELECT * FROM t_kandidat WHERE periode = ?") or die($con->error);
         $sql->bind_param('s', $periode);
         $sql->execute();
         $sql->store_result();
         if ($sql->num_rows() > 0) {
            $numb = $sql->num_rows();
            echo '<div class="text-center " style="margin-top:0px;">
                     <h2 style="color: white;margin-top:-0px; text-shadow: 2px 2px 2px black;">Daftar Calon Ketua Osis Periode '.$periode.'</h2>
                  <hr class="hr" / style="margin-bottom: 50px;">
                  </div>	
				  
				  ';

            echo '<center> <div class="row">';

            echo '<div class="col-md-10 col-md-offset-1">';

               for ($i = 1; $i <= $numb; $i++) {
                  $sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode, $program, $no_k);
                  $sql->fetch();
         ?>
                  <div class="col-md-4 container">
                    <section class="wow fadeInDown" data-wow-delay="<?php echo $i; ?>s">
                      <div class="athumbnail"> 
						<div class="card">
						  <img src="./assets/img/kandidat/<?php echo $foto; ?>" alt="John" style="width:80%; height: 300px;">
						  <p style="font-size:20px; color: white; margin-top: 10px; text-shadow: 1px 2px 1px black;	"><?php echo $nama; ?></p>
						  <h6 style="color: white;">KANDIDAT KETUA OSIS</h6>
						  <a href="./detail.php?id=<?php echo $id; ?>"><button>LIHAT</button></a>
						</div>

                     </section>
                  </div>

         <?php
               }

            echo '</div>';

         } else {

            echo '<div class="callout warning">
                     <h2>Belum Ada Calon Ketua</h2>
                  </div>';
         }

         echo '</div>';
         ?>
      </div>
      </center>
      <script type="text/javascript" src="./assets/js/jquery.js"></script>
      <script type="text/javascript" src="./assets/js/wow.js"></script>
      <script type="text/javascript">
         wow = new WOW(
            {
               animateClass: 'animated',
               offset:100,
               callback:function(box) {
                  console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
               }
            }
         );
         wow.init();
      </script>
   </body>
</html>
