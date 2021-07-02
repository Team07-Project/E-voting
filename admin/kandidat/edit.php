<?php
if(!isset($_SESSION['id_admin']) || !isset($_GET['id'])) {
   header('location:../');
}

$id   = $_GET['id'];
$sql  = $con->prepare("SELECT * FROM t_kandidat WHERE id_kandidat = ?") or die($con->error);
$sql->bind_param('i', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode, $program, $no_k);
$sql->fetch();
?>
<h3 class="pt-5 pl-5 pb-3">Edit Data Kandidat</h3>
<hr class="mr-5 ml-5" />
<div class="row mb-5">
   <div class="col-md-4">
      <div class="callout text-center ml-5">
         <img src="../assets/img/kandidat/<?php echo $foto; ?>" class="img-responsive"/>
      </div>
   </div>
   <div class="col-md-7 mr-5" style="margin-top:-70px;">
	<form method="post" action="./kandidat/update.php" enctype="multipart/form-data">
	<table class="table table-borderless">
	<tr>
	<td> <input type="hidden" name="id" value="<?php echo $id; ?>" />
		 <input type="hidden" name="f" value="<?php echo $foto; ?>" />
	</td>
	</tr>
	<tr>
		<td> No Kandidat </td>
		<td> <input type="number" class="form-control" name="no_k" required="No Kandidat" value="<?php echo $no_k; ?>"/> </td>
	</tr>
	<tr>
		<td> Nama Kandidat </td>
		<td> <input type="text" class="form-control" name="nama" required="Nama" value="<?php echo $nama; ?>"/> </td>
	</tr>
	<tr>
		<td> Foto Kandidat </td>
		<td> <input type="file" class="form-control" name="foto"/> </td>
	</tr>
	<tr>
		<td> Visi </td>
		<td> <textarea type="" name="visi" class="form-control" rows="3" required="Visi" value=""> <?php echo $visi; ?> </textarea> </td>
	</tr>
	<tr>
		<td> Misi </td>
		<td> <textarea type="" name="misi" class="form-control" rows="3" value="" required="Visi"> <?php echo $misi; ?> </textarea> </td>
	</tr>
	<tr>
		<td> Program </td>
		<td> <input type="text" name="program" class="form-control" rows="3" value="<?php echo $program; ?>" required="Program"> </input> </td>
	</tr>
	</table>
	            <div class="form-group" style="padding-top:0px;">
                <div class="col-md-8 col-md-offset-3">
                    <button type="submit" name="update" value="Update Kandidat" class="btn btn-success">
                        Update Kandidat
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
                </div>
            </div>
	</form>
   <!--
        <form action="./kandidat/update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <table class="table-borderless">
			<tr>
			<td> 
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="hidden" name="f" value="<?php echo $foto; ?>" />

            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Kandidat</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="nama" required="Nama" value="<?php echo $nama; ?>"/>
                </div>
            </div>

            <div class="form-group">
                  <label class="col-sm-3 control-label">Foto Kandidat</label>
               <div class="col-md-6">
                  <input type="file" class="form-control" name="foto"/>
               </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Visi</label>
                <div class="col-md-8">
                    <textarea name="visi" class="form-control" rows="3" required="Visi"><?php echo $visi; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Misi</label>
                <div class="col-md-8">
                    <textarea name="misi"class="form-control" rows="3" required="Misi"><?php echo $misi; ?></textarea>
                </div>
            </div>

            <div class="form-group" style="padding-top:20px;">
                <div class="col-md-8 col-md-offset-3">
                    <button type="submit" name="update" value="Update Kandidat" class="btn btn-success">
                        Update Kandidat
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
                </div>
            </div>

         </form> -->
   </div>
</div>
