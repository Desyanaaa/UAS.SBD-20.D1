<?php
include ("../../koneksi.php");

$id = $_POST['textid'];
$nama = $_POST['textnama'];
$sql = "SELECT * FROM dokter WHERE id_dokter='$id'";
$query = mysqli_query($koneksi, $sql);
$row=mysqli_fetch_assoc($query);
$insert="INSERT INTO dokter(id_dokter,nama_dokter) VALUES ('$id','$nama')";
$query = mysqli_query($koneksi,$insert);
echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='dokter.php?id_dokter=".$id."&#menu'</script>";

?>
