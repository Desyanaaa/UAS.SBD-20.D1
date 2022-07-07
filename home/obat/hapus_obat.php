<?php
	include"../../koneksi.php";
	$sql = "DELETE FROM obat where id_obat='$_GET[id_obat]'";
	$query = mysqli_query($koneksi, $sql);
	echo "<script>alert('Berhasil, Data Terhapus!'); window.location='obat.php#menu'</script>";
?>
