<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if(isset($_POST['add_user'])) {

   $nis  = $_POST['nis'];
   $nama = $_POST['nama'];
   $jk   = $_POST['jk'];
   $kls  = $_POST['kelas'];
   //cek nis
   $get_id = $con->prepare("SELECT * FROM t_user WHERE id_user = ?");
   $get_id->bind_param('s', $nis);
   $get_id->execute();
   $get_id->store_result();
   $numb = $get_id->num_rows();
   //validasi
   if($nis == '' || $nama == '' || $jk == '' || $kls == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");</script>';

   } else if(!preg_match("/^[a-zA-z \'.]*$/",$nama)) {

      echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, titik(.), petik tunggal");</script>';

   } else if($numb > 0){

      echo '<script type="text/javascript">alert("Nis tidak dapat digunakan");window.history.go(-1);</script>';

   } else {

      $sql = $con->prepare("INSERT INTO t_user(id_user, fullname, id_kelas, jk) VALUES(?, ?, ?, ?)");
      $sql->bind_param('ssss', $nis, $nama, $kls, $jk);
      $sql->execute();

      header('location: ?page=user');

   }

}
?>
<h3 class="pt-5 pl-5 pb-3" >Tambah Data Siswa</h3>
<hr class="ml-5 mr-5" />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal ml-4">
		<table class="table table-borderless">
			<tr>
				<td> NIS </td>
				<td> <input class="form-control" type="number" name="nis" placeholder="NIS" autofocus autocomplete='off' type="number"/> </td>
			</tr>
			<tr>
				<td> Nama Siswa </td>
				<td> <input class="form-control" name="nama" type="text" autocomplete='off' placeholder="Nama Siswa"/> </td>
			</tr>
			<tr>
				<td> Jenis Kelamin </td>
				<td> <label class="radio-inline">
                        <input type="radio" name="jk" value="L" id="L"> Laki - laki
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="jk" value="P" id="P"> Perempuan
                    </label> </td>
			</tr>
			<tr>
				<td> Kelas </td>
				<td> 
                    <select name="kelas" required="kelas" class="form-control">
                        <option value="#">-- Pilih Kelas --</option>
                        <?php
                            $kelas = mysqli_query($con, "SELECT * FROM t_kelas");
                            while ($key = mysqli_fetch_array($kelas)) {
                            ?>
                                <option value="<?php echo $key['id_kelas']; ?>">
                                    <?php echo $key['nama_kelas']; ?>
                                </option>
                                <?php
                            }
                        ?>
                    </select> </td>
			</tr>
			</table>
            <div class="form-group ml-3">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="add_user" value="Tambah User" class="btn btn-success">Tambah Siswa</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>
