<?php
	include"../../koneksi.php";
	$sql = "DELETE FROM users where id='$_GET[id_user]'";
	$query = mysqli_query($koneksi, $sql);
	echo "<script>alert('Berhasil, Data Terhapus!'); window.location='user.php#menu'</script>";
?>
