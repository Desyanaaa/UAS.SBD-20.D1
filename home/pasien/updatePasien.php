<?php
include ("../../koneksi.php");
$key = mysqli_real_escape_string($koneksi, $_GET['q']);

if(isset($_POST['exc'])){

	$id = $_GET['q'];
	$nama = $_POST['textnama'];
	$jenis = $_POST['jenisKelamin'];
	$umur = $_POST['umur'];
	$sql ="UPDATE pasien SET nama_pasien='$nama', jenis_kelamin='$jenis', umur='$umur' WHERE id_pasien='$id'";
	$query = mysqli_query($koneksi, $sql);
	
	if($query){
		echo "<script>alert('Transaksi Sukses. Data Sudah diperbarui');window.location='pasien.php#menu'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan!');window.location='pasien.php#book'</script>";}
}else{
	echo "<script>window.history.back()</script>";
}

?>
