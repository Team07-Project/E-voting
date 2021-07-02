<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>
<div class="row">
   <div class="col-md-9 col-sm-9 p-5">
      <h3>Daftar Kelas</h3>
   </div>
   <div class="col-md-3 col-sm-3 pt-5 " style="padding-top:10px; margin-left: -187px;">
      <a class="btn btn-primary " href="?page=kelas&action=tambah">Tambah Kelas</a>
   </div>
<div style="clear:both"></div>
<hr />
</div>
<div class="row">

   <div class="col-md-8 ml-5" >
   <?php
    if (isset($_GET['pesan'])){
      if($_GET['pesan'] == "berhasil"){
            echo "<p> <div class=' alert alert-success alert-dismissible fade show' role='alert'> Data Kelas Berhasil di tambahkan <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true' style='color:white;'>&times;</span>
          </button> </div> </p>";
      }elseif($_GET['pesan'] == ""){
            echo "<p> <div class='  alert alert-danger alert-dismissible fade show' role='alert'> Data Kelas Gagal di tambahkan <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true' style='color:white;'>&times;</span>
          </button> </div> </p>";
      }
}
?>   
      <table class="table table-striped table-hover">
         <thead >
            <tr align="center" class="bg-primary">
               <th width="80px" style="text-align:center;" class="text-white">#</th>
               <th style="text-align:center;" class="text-white">Nama Kelas</th>
               <th width="150px" style="text-align:center;" class="text-white">Jumlah Siswa</th>
               <th width="200px" style="text-align:center;" class="text-white">Opsi</th>
            </tr>
         </thead>
         <tbody>
            <?php
            require('../include/connection.php');
            $sql = mysqli_query($con, "SELECT a.*, (SELECT COUNT(id_kelas) FROM t_user WHERE id_kelas = a.id_kelas) AS jumlah FROM t_kelas a ORDER BY a.id_kelas ASC");

            if (mysqli_num_rows($sql) > 0) {

               while($data = mysqli_fetch_array($sql)) {
                  ?>
                  <tr>
                     <td style="text-align:center; vertical-align:middle">
                        <?php echo $data['id_kelas']; ?>
                     </td>
                     <td style="text-align:center; vertical-align:middle">
                        <?php echo $data['nama_kelas']; ?>
                     </td>
                     <td style="text-align:center; vertical-align:middle">
                        <?php echo $data['jumlah']; ?> Siswa
                     </td>
                     <td style="text-align:center;">
                        <a href="?page=kelas&action=edit&id=<?php echo $data['id_kelas']; ?>" class="btn btn-warning btn-sm">
                           Edit
                        </a>
                        <a href="?page=kelas&action=hapus&id=<?php echo $data['id_kelas']; ?>" onclick="return confirm('Yakin ingin menghapus kelas ini ?');" class="btn btn-danger btn-sm">
                           Hapus
                        </a>
                     </td>
                  </tr>
                  <?php
               }
            } else {

               echo "<tr>
                        <td colspan='4' style='text-align:center;'><h4>Belum ada data</h4></td>
                     </tr>";
            }
            ?>
         </tbody>
      </table>
   </div>
</div>
