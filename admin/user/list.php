<?php
if (!isset($_SESSION['id_admin'])) {
      header('location: ../');
}?>
  <!-- <link href="../assets/table/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->


<div class="row">
      <div class="col-md-9 col-sm-9 p-5 ml-3">
            <h3>Daftar Siswa</h3>
      </div>
      <div class="col-md-3 col-sm-3 pt-5 " style="padding-top:10px; margin-left: -50px;">
            <a class="btn btn-primary" href="?page=user&action=tambah">Tambah Siswa</a>
            <a class="btn btn-success" href="?page=user&action=import">Import Siswa</a>
      </div>
      <div style="clear:both"></div>
      <hr />
      <div class="col-md-11 col-sm-12 ml-5 ">
            <?php
if (isset($_GET['pesan'])){
      if($_GET['pesan'] == "Berhasil"){
            echo "<p> <div class=' alert alert-success alert-dismissible fade show' role='alert'> Data Berhasil di tambahkan <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true' style='color:white;'>&times;</span>
          </button> </div> </p>";
      }elseif($_GET['pesan'] == ""){
            echo "<p> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Data Gagal di tambahkan <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true' style='color:white;'>&times;</span>
          </button> </div> </p>";
      }
}
?>
            <div class="table-responsive mb-5">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr class="bg-primary" class="header">
                              <th style="text-align:center;" class="text-white">NO</th>
                              <th style="text-align:center;" class="text-white">Nama Siswa</th>
                              <th style="text-align:center" class="text-white">Kelas</th>
                              <th width="200px" class="text-white text-center">Jenis Kelamin</th>
                              <th width="200px" style="text-align:center;" class="text-white">Opsi</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php
                        require('../include/connection.php');
                        $no = 1;
                        $sql = mysqli_query($con, "SELECT * FROM t_user JOIN t_kelas ON t_user.id_kelas = t_kelas.id_kelas");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                                    <tr>
                                          <td style="text-align:center;vertical-align:middle;">
                                                <?php echo $no++; ?>
                                          </td>
                                          <td style="padding-left:25px;vertical-align:middle;">
                                                <?php echo $data['fullname']; ?>
                                          </td>
                                          <td style="text-align:center;vertical-align:middle;">
                                                <?php echo $data['nama_kelas']; ?>
                                          </td>
                                          <td style="text-align:center;vertical-align:middle;">
                                                <?php
                                                if ($data['jk'] == 'L') {
                                                      echo 'Laki - laki';
                                                } else {
                                                      echo 'Perempuan';
                                                }
                                                ?>
                                          </td>
                                          <td style="text-align:center;vertical-align:middle;">
                                                <a href="?page=user&action=edit&id=<?php echo $data['id_user']; ?>" class="btn btn-warning btn-sm">
                                                      Edit
                                                </a>
                                                <a href="?page=user&action=hapus&id=<?php echo $data['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus user ini ?');" class="btn btn-danger btn-sm">
                                                      Hapus
                                                </a>
                                          </td>
                                    </tr>
                        <?php
                              }
                        ?>
                  </tbody>
                </table>
                </div>


