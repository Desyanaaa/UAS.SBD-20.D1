<?php
	include ("../../koneksi.php");

	$idObat	= $_POST['idObat'];
	$idBerobat	= $_POST['idBerobat'];

	$sql = "INSERT INTO resep_obat(id_berobat, id_obat) VALUES('{$idBerobat}', '{$idObat}')";
	$result = mysqli_query($koneksi, $sql);
	echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='resep.php'</script>";
?>
