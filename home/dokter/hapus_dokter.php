<?php
	include"../../koneksi.php";

	$sql = "DELETE FROM dokter where id_dokter='$_GET[id_dokter]'";
	$query = mysqli_query($koneksi,$sql);
	if($query){
		echo "<script>alert('Data Berhasil Dihapus');window.location='dokter.php#menu'</script>";
	}else{
		echo "<script>alert('Data Tidak Bisa Dihapus, karena sudah menangani pasien');window.location='dokter.php#menu'</script>";
	}
?>
