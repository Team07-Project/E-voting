<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>
<h3 class="pl-5 pt-5 pb-3">Tambah Kandidat</h3>
<hr class="ml-5 mr-2" />
<div class="row">
    <div class="col-md-8">
        <form action="./kandidat/simpan.php" class="ml-4" method="post" enctype="multipart/form-data" class="form-horizontal">
			<table class="table table-borderless">
				<tr>
					<td> No Kandidat </td>
					<td> <input type="number" name="no_k" class="form-control" required="Nama" /> </td>
				</tr>
				<tr>
					<td> Nama Kandidat </td>
					<td> <input type="text" autocomplete='off' name="nama" class="form-control" required="Nama" /> </td>
				</tr>
				<tr>
					<td> Foto Kandidat </td>
					<td> <input type="file" name="foto" class="form-control" required="Foto"/> </td>
				</tr>
				<tr>
					<td> Visi </td>
					<td> <textarea name="visi" rows="3" class="form-control" required="Visi"> </textarea> </td>
				</tr>
				<tr>
					<td> Misi </td>
					<td> <textarea name="misi" rows="3" required="Misi" class="form-control"> </textarea> </td>
				</tr>
				<tr>
					<td> Program </td>
					<td> <textarea name="program" rows="3" required="Program" class="form-control"> </textarea> </td>
				</tr>
			</table>

            <div class="form-group ml-1 pb-2" style="padding-top:20px;">
                <div class="col-md-offset-3 col-md-8">
                    <button type="submit" name="add_kandidat" value="Tambah Kandidat" class="btn btn-success">
                        Tambah Kandidat
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
