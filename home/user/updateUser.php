<?php
include ("../../koneksi.php");
$key = mysqli_real_escape_string($koneksi, $_GET['q']);

if(isset($_POST['exc'])){

	$id = $_GET['q'];
	$username = $_POST['username'];
	$namaLengkap = $_POST['namaLengkap'];
	$password = $_POST['password'];
	$sql ="UPDATE users SET username='$username', password='$password', nama_lengkap='$namaLengkap' WHERE id='$id'";
	$query = mysqli_query($koneksi, $sql);
	
	if($query){
		echo "<script>alert('Transaksi Sukses. Data Sudah diperbarui');window.location='user.php#menu'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan!');window.location='user.php#book'</script>";}
}else{
	echo "<script>window.history.back()</script>";
}

?>
