<?php
	include"../../koneksi.php";
	$sql = "DELETE FROM pasien where id_pasien='$_GET[id_pasien]'";
	$query = mysqli_query($koneksi, $sql);
	echo "<script>alert('Berhasil, Data Terhapus!'); window.location='pasien.php#menu'</script>";
?>
