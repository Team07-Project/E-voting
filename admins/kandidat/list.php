<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>

<div class="row">
   <div class="col-md-9">
      <h3 class="pt-5 pl-5 pb-3">Daftar Kandidat</h3>
   </div>
   <div class="col-md-3" style="padding-top:50px;">
      <a class="btn btn-primary" href="?page=kandidat&action=tambah">Tambah Kandidat</a>
   </div>
</div>
<hr class="ml-5 mr-5"/>
<div class="row">
    <div class="col-md-3 ml-5">
        <select id="periode" class="form-control">
            <option value="">-- Pilih Periode--</option>
            <?php
            for ($i=16; $i < 40; $i++) {
               $k = $i + 1;
               echo '<option value="20'.$i.'/20'.$k.'">Periode 20'.$i.' / 20'.$k.'</option>';
            }
            ?>
        </select>
    </div>
    
    <div style="clear:both"></div>

    <div class="col-md-12 mt-2 " align='center'>
    <div style="clear:both"></div>
    <?php
    if (isset($_GET['pesan'])){
      if($_GET['pesan'] == "Berhasil"){
            echo "<p> <div class='mr-5 ml-5 alert alert-success alert-dismissible fade show' role='alert'> Kandidat Berhasil di tambahkan <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true' style='color:white;'>&times;</span>
          </button> </div> </p>";
      }elseif($_GET['pesan'] == ""){
            echo "<p> <div class='mr-5 ml-5  alert alert-danger alert-dismissible fade show' role='alert'> Kandidat Gagal di tambahkan <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true' style='color:white;'>&times;</span>
          </button> </div> </p>";
      }
}
?>
        <div class=" ml-4 mr-4 " id="data">
            <br>
        </div>
    </div>
</div>
