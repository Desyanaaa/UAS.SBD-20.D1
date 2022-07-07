<?php
	include ("../../koneksi.php");

	$id = $_POST['textid'];
	$nama = $_POST['textnama'];
	$sql = "SELECT * FROM obat WHERE id_obat='$id'";
	$query = mysqli_query($koneksi, $sql);
	$row=mysqli_fetch_assoc($query);
	$insert= "INSERT INTO obat(id_obat, nama_obat) VALUES ('$id', '$nama')";
	$query = mysqli_query($koneksi, $insert);
	echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='obat.php?id_obat=".$id."&#menu'</script>";
?>
