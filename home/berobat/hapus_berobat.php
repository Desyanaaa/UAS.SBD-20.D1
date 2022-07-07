<?php
	include"../../koneksi.php";

	$sql = "DELETE FROM berobat where id_berobat='$_GET[id_berobat]'";
	$query = mysqli_query($koneksi,$sql);
	echo "<script>window.location='berobat.php#menu'</script>";
?>
