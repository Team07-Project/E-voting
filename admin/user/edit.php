<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

$id   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

$sql  = $con->prepare("SELECT * FROM t_user WHERE id_user = ?") or die($con->error);
$sql->bind_param('s', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id_user, $fullname, $kls, $jk, $pemilih);
$sql->fetch();

?>
<h3 class="pt-5 pl-5 pb-3">Update Data Siswa</h3>
<hr class="ml-5 mr-5" />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="./user/update.php" method="post" class="form-horizontal">
		<table class="table table-borderless">
		<tr>
		<th class="pl-5"> NIS </th>
		<td> <input class="form-control" type="number" name="nis" placeholder="NIS" type="number" readonly value="<?php echo $id_user; ?>"/> </td>
		</tr>
		<tr>
		<th class="pl-5"> Nama Siswa </th>
		<td> <input class="form-control" name="nama" type="text" placeholder="Nama Siswa" value="<?php echo $fullname; ?>"/> </td>
		</tr>
		<tr>
		<th class="pl-5"> Jenis Kelamin  </th>
		<td> 
                    <label class="radio-inline">
                        <input type="radio" name="jk" value="L" id="L" <?php if($jk == 'L') { echo 'checked'; } ?>> Laki - laki
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="jk" value="P" id="P" <?php if($jk == 'P') { echo 'checked'; } ?>> Perempuan
                    </label> </td>
		</tr>
		<tr>
		<th class="pl-5"> Kelas </th>
		<td> 
                    <select name="kelas" required="kelas" class="form-control">
                        <option value="#">-- Pilih Kelas --</option>
                        <?php
                            $kelas = mysqli_query($con, "SELECT * FROM t_kelas");
                            while ($key = mysqli_fetch_array($kelas)) {
                            ?>
                                <option value="<?php echo $key['id_kelas']; ?>" <?php if ($kls == $key['id_kelas']) { echo 'selected'; } ?> >
                                    <?php echo $key['nama_kelas']; ?>
                                </option>
                                <?php
                            }
                        ?>
                    </select></td>
		</tr>
		<tr>
		<th class="pl-5"> Pemilih </th>
		<td> 
                    <select name="pemilih" required="Pemilih" class="form-control">
                        <option value="Y" <?php if($pemilih == 'Y') { echo 'selected';} ?>>Aktif</option>
                        <option value="N" <?php if($pemilih == 'N') { echo 'selected';} ?>>Tidak</option>
                    </select> </td>
		</tr>
                
      </table>
            
            <div class="form-group ml-4">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="update" value="Update User" class="btn btn-success">Update Siswa</button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">Kembali</button>
                </div>
            </div>
      
        </form>
    </div>
</div>
