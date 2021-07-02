<?php
if (!isset($_SESSION['id_admin'])) {
   header('location:./');
}

if (isset($_POST['update_profil'])) {

   $nama     = $_POST['username'];
   $fullname = $_POST['fullname'];
   $pass     = $_POST['pass'];

   if($nama == '' || $fullname == '' || $pass == '') {

      echo '<script type="text/javascript">alert("Semua form harus diisi");</script>';

   } else {

      $get = $con->prepare("SELECT * FROM t_admin WHERE id_admin = ?") or die($con->error);
      $get->bind_param('i', $_SESSION['id_admin']);
      $get->execute();
      $get->store_result();

      if($get->num_rows() > 0) {

         $get->bind_result($id, $nama1, $full, $password);
         $get->fetch();

         //validasi password
         if(password_verify($pass, $password)) {

            $sql = $con->prepare("UPDATE t_admin SET username = ?, fullname = ? WHERE id_admin = ?") or die($con->error);
            $sql->bind_param('ssi',$nama, $fullname, $id);
            $sql->execute();

            $_SESSION['user'] = $fullname;

            header('location: ./');

         } else {

            echo '<script type="text/javascript">alert("Akses Illegal !!");window.location.replace("?page=logout");</script>';

         }

      }

   }

}

$sql = $con->prepare("SELECT * FROM t_admin WHERE id_admin = ?");
$sql->bind_param('i', $_SESSION['id_admin']);
$sql->execute();
$sql->store_result();
$sql->bind_result($id, $username, $fullname, $pass);
$sql->fetch();
?>
<h3 class="pl-5 pb-3 pt-5">Edit Profil</h3>
<hr class="ml-5 mr-5" />
<div class="row">
   <div class="col-md-11 col-md-offset-1">
        <form action="" method="post" class="form-horizontal ml-4">
			<table class="table table-borderless">
				<tr>
					<td> Username </td>
					<td> <input type="text" name="username" value="<?php echo $username; ?>" required placeholder="Username" class="form-control"> </td>
				</tr>
				<tr>
					<td> Fullname  </td>
					<td> <input type="text" name="fullname" value="<?php echo $fullname; ?>" required placeholder="Fullname" class="form-control"></td>
				</tr>
				<tr>
					<td> Password </td>
					<td> <input type="password" class="form-control" name="pass" required="Password" placeholder="Masukkan Password Anda"></td>
				</tr>
			</table>


            <div class="form-group ml-2">
                <div class="col-md-8 col-md-offset-3">
                    <button type="submit" name="update_profil" class="btn btn-success" value="Update Profil">
                        Update Profil
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
                </div>
            </div>
         </form>
   </div>
</div>
