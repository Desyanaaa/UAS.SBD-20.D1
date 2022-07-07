<?php
	include ("../../koneksi.php");

	$id = $_POST['textid'];
	$nama = $_POST['textnama'];
	$jenis = $_POST['jenisKelamin'];
	$umur = $_POST['umur'];
	$sql = "SELECT * FROM pasien WHERE id_pasien='$id'";
	$query = mysqli_query($koneksi, $sql);
	$row=mysqli_fetch_assoc($query);
	$insert="INSERT INTO pasien(id_pasien, nama_pasien, jenis_kelamin, umur) VALUES ('$id','$nama', '$jenis', '$umur')";
	$query = mysqli_query($koneksi, $insert);
	// var_dump($query);
	echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='pasien.php?id_pasien=".$id."&#menu'</script>";
?>
