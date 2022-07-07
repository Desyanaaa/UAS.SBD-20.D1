<?php
include ("../../koneksi.php");

$idPasien   = $_POST['idPasien'];
$keluhan    = $_POST['keluhan'];
$idDokter   = $_POST['idDokter'];
$diagnosa   = $_POST['diagnosa'];
$tanggal    = date('Y-m-d');
$penatalaksanaan = $_POST['penatalaksanaan'];

$insert = "INSERT INTO berobat(id_pasien, id_dokter, tgl_berobat, keluhan_pasien, hasil_diagnosa, penatalaksanaan) VALUES ('$idPasien', '$idDokter', '$tanggal', '$keluhan', '$diagnosa', '$penatalaksanaan')";
$query = mysqli_query($koneksi, $insert);
// var_dump($query);
echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='berobat.php'</script>";

?>
