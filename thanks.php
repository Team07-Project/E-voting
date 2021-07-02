<?php
defined('BASEPATH') or die("No Access Allowed");
?>
<style>
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
		  background-image : url('images/waw.jpg');
		  background-size: 1500px 700px;
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

</style>
<link rel="icon" href="images/almadani.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="text-center" style="padding-top:20px;padding-bottom:40px;">
   <div style="padding-bottom:10px">
      <img src="./assets/img/osis.png" class="img-thanks" alt="Slideshow 1" >
   </div>
   <h1 class="text-white abcd" style="font-size:40px;">Terima kasih atas partisipasi anda</h1>
   <p  class="text-white abcd" style="font-size:18px;">Suara yang anda berikan menentukan masa depan sekolah</p>
<a href="./" class="btn btn-outline-dark btn-lg rounded-pill " style="padding-left:50px; padding-right:50px; padding-bottom:10px; padding-top:10px; font-size:20px;"> Back To Login </a>
</div>
