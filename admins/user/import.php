

<form method="post" enctype="multipart/form-data" action="user/proses.php">
    <h2 class="mt-5 ml-5">Pilih File</h2>
    <div class="alert alert-danger ml-5 mr-5">
        Download Template file datanya disini <a target="_blank" href="user/excel/data_siswa.xlsx" > <div class='btn btn-success btn-sm ml-2'> Data Siswa.xlsx </div> </a>
    </div>
    <div class="row p-5">
        <div class="col-md-9">
            <div class="custom-file shadow-sm">
                <input type="file" class="custom-file-input" name="berkas_excel" id="customFile" required="Mohon Pilih File">
                <label class="custom-file-label" for="customFile">Pilih file .xlsx</label>
            </div>
        </div>
        <div class="col-md-3">
            <input class="btn btn-success" type="submit" value="Import">
            <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
        </div>
    </div>
</form>
<h4 class='ml-5 mt-2'> Pemberitahuan : </h4>
    <h5 class='ml-5'>Untuk mengisi data kelas harus memakai kode yang sudah di sediakan </h5>
        <h6 class='ml-5 mb-2'> <?php 
            include 'koneksi.php';
            $data = mysqli_query($koneksi,"SELECT * FROM t_kelas ");
            while($d = mysqli_fetch_array($data)){
            ?>
            <?php echo $d['id_kelas'];  ?> = <?php echo $d['nama_kelas']; ?> <br>
             <?php
            }
            ?> </h6>
            <h5 class='ml-5'>Contoh :</h5>
            <img class='ml-5 mb-5' src="user/Capture.PNG" height='200px' >
