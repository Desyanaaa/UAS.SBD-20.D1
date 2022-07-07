<?php
include ("../../koneksi.php");
$key = mysqli_real_escape_string($koneksi,$_GET['q']);

if(isset($_POST['exc'])){

	$id = $_GET['q'];
	$nama = $_POST['textnama'];
	$sql ="UPDATE dokter SET nama_dokter='$nama' WHERE id_dokter = '$id'";
	$query = mysqli_query($koneksi,$sql);
	if($query){
		echo "<script>alert('Transaksi Sukses. Data Sudah diperbarui');window.location='dokter.php#menu'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan!');window.location='dokter.php#book'</script>";
	}
}else{
	echo "<script>window.history.back()</script>";
}

?>
