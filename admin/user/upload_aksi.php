<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->
 
<?php 
// menghubungkan dengan koneksi
include 'excel_reader2.php';
// menghubungkan dengan library excel reader
include '../../include/connection.php';
?>
<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=3; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nis    = $data->val($i, 1);
	$nama   = $data->val($i, 2);
	$kelas  = $data->val($i, 3);
	$jenis  = $data->val($i, 4);

	if($nis != "" && $nama != "" && $kelas != "" && $jenis != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into t_user values('$nis','$nama','$kelas','$jenis','Y')");
		$berhasil++;
	}
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);
 
// alihkan halaman ke index.php
header("location:list.php?berhasil=$berhasil");
?>