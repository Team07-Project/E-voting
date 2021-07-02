<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

$id = strip_tags(mysqli_real_escape_string($con, $_GET['id']));
$sql = $con->prepare("SELECT * FROM t_kandidat WHERE id_kandidat = ?") or die($con->error);
$sql->bind_param('i', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode, $program, $no_k);
$sql->fetch();
?>
<h3 class="pl-5 pt-5 pb-3">Detail Kandidat</h3>
<hr class="ml-5 mr-5"/>
<!--
<div class="row">
   <div class="col-md-3">
      <div class="callout text-center">
         <img src="../assets/img/kandidat/<?php echo $foto; ?>" alt="<?php echo $foto; ?>" class="img-responsive">
      </div>
   </div>
   <div class="col-md-9" style="padding-top:20px;">
      <table class="table table-striped">
         <tbody>
            <tr>
               <td width="150">Nama Kandidat</td>
               <td>: <?php echo $nama; ?></td>
            </tr>
            <tr>
               <td>Visi</td>
               <td>: <?php echo $visi; ?></td>
            </tr>
            <tr>
               <td>Misi</td>
               <td>: <?php echo $misi; ?></td>
            </tr>
            <tr>
               <td>Jumlah Suara</td>
               <td>: <?php echo $suara; ?></td>
            </tr>
            <tr>
               <td>Periode</td>
               <td>: <?php echo $periode; ?></td>
            </tr>
         </tbody>
      </table>
   </div>
   <div class="col-md-9 col-md-offset-3 ml-5 mb-5">
        <a href="?page=kandidat&action=edit&id=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
        <a href="?page=kandidat" class="btn btn-danger">Kembali</a>
   </div>
</div>
-->
<div class="card mb-3 bg-transparent  ml-5 mt-3 " style="max-width: 945px;">
  <div class="row no-gutters">
    <div class="col-md-4">
    <center>
      <img src="../assets/img/kandidat/<?php echo $foto; ?>" alt="<?php echo $foto; ?>"  height='350' alt="...">
    </div> </center>
	<div class="col-md-8">
      <table class="table table-hover">
         <tbody>
            <tr>
               <td width="150">No Kandidat</td>
               <td>: <?php echo $no_k; ?></td>
            </tr>
            <tr>
               <td width="150">Nama Kandidat</td>
               <td>: <?php echo $nama; ?></td>
            </tr>
            <tr>
               <td>Visi</td>
               <td>: <?php echo nl2br($visi) ?></td>
            </tr>
            <tr>
               <td>Misi</td>
               <td>: <?php echo nl2br($misi) ?></td>
            </tr>
            <tr>
               <td>Jumlah Suara</td>
               <td>: <?php echo nl2br($suara) ?></td>
            </tr>
            <tr>
               <td>Periode</td>
               <td>: <?php echo nl2br($periode) ?></td>
            </tr>
            <tr>
               <td>Program</td>
               <td>:
                   <?php echo nl2br($program)?>
               </td>
            </tr>
         </tbody>
      </table>
	  </div>
  </div>
	     <div class="col-md-9 col-md-offset-3" style="margin-left:35px; margin-bottom: 30px; margin-top: 30px;">
        <a href="?page=kandidat&action=edit&id=<?php echo $id; ?>" class="btn btn-success">Edit</a>
        <a href="?page=kandidat" class="btn btn-danger">Kembali</a>
   </div>
</div>
