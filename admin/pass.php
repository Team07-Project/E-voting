<?php
if (!isset($_SESSION['id_admin'])) {
   header('location:./');
}

if (isset($_POST['update_pass'])) {

   $get = $con->prepare("SELECT password FROM t_admin WHERE id_admin = ?");
   $get->bind_param('i', $_SESSION['id_admin']);
   $get->execute();
   $get->store_result();
   if ($get->num_rows() > 0) {

      $get->bind_result($password);
      $get->fetch();

      $pass1 = mysqli_real_escape_string($con, $_POST['lama']);
      $pass2 = password_hash(mysqli_real_escape_string($con,$_POST['baru']), PASSWORD_BCRYPT, ['cost' => 10]);

      if(password_verify($pass1, $password)) {

         $get = $con->prepare("UPDATE t_admin SET password = ? WHERE id_admin = ?");
         $get->bind_param('si', $pass2, $_SESSION['id_admin']);
         $get->execute();

         echo '<script type="text/javascript">window.location.replace("?page=logout");</script>';

      } else {

         echo '<script type="text/javascript">alert("Akses Illegal");window.location.replace("?page=logout");</script>';

      }

   } else {

      echo '<script type="text/javascript">alert("Akses Illegal");window.location.replace("?page=logout");</script>';

   }

}
?>
<h3 class="pl-5 pb-3 pt-5">Ganti Password</h3>
<hr class="ml-5 mr-5" />
<div class="row">
    <div class="col-md-10">
        <form action="" method="post" class="form-horizontal ml-4">
			<table class="table table-borderless">
				<tr>
					<td> Password Lama </td>
					<td> <input type="password" class="form-control" name="lama" placeholder="Password Lama" required="Password" /> </td>
				</tr>
				<tr>
					<td> Password Baru </td>
					<td> <input type="password" class="form-control" name="baru" placeholder="Password Baru" required="Password" /> </td>
				</tr>
			</table>
            <div class="form-group ml-2">
                <div class="col-md-8 col-md-offset-3">
                    <p class="help-text" style="color:#666464;">
                        Note : Anda harus login ulang saat password berhasil diupdate
                    </p>
                    <button type="submit" name="update_pass" class="btn btn-success" value="Update Password">
                        Update Password
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
               </div>
            </div>

         </form>
    </div>
</div>
