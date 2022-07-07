<?php
	include '../../koneksi.php';
	$id = $_GET['id_resep'];
	$sql = "DELETE FROM resep_obat WHERE id_resep='{$id}'";
	$result = mysqli_query($koneksi, $sql);
	header('location: resep.php');
?>