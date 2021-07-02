<?php
if(!isset($_SESSION['id_admin']) && !isset($_GET['id'])) {
   header('location: ../');
}
$id = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

$sql = $con->prepare("SELECT * FROM t_kelas WHERE id_kelas = ?");
$sql->bind_param('s', $id);
$sql->execute();
$sql->store_result();
$num = $sql->num_rows();
$sql->bind_result($idk, $kelas);
$sql->fetch();

if ($num > 0) {
?>
<h3 class="pt-5 pl-5 pb-3">Update Kelas</h3>
<hr class="ml-5 mr-5" />
<div class="row">
    <div class="col-md-12">

        <form action="./kelas/update.php" class="ml-4" method="post">
			<table class="table table-borderless">
				<tr>
					<td> ID Kelas </td>
					<td> <input class="form-control" type="text" name="id" readonly value="<?php echo $idk; ?>" /> </td>
				</tr>
				<tr>
					<td> Nama Kelas </td>
					<td> <input class="form-control" name="kelas" type="text" placeholder="Nama Kelas" value="<?php echo $kelas; ?>"/> </td>
				</tr>
			</table>
            <div class="form-group ml-4">
                <button type="submit" name="update" value="Update" class="btn btn-success">
                    Update Kelas
                </button>
                <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                    Kembali
                </button>
            </div>
      </form>
   </div>
</div>


<?php
} else {
   header('location:?page=kelas');
}
?>
