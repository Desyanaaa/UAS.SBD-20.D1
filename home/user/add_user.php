<?php
	include ("../../koneksi.php");

	$username = $_POST['username'];
	$namaLengkap = $_POST['namaLengkap'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM users WHERE username='$username'";
	$query = mysqli_query($koneksi, $sql);
	$jumlah = mysqli_num_rows($query);
    if($jumlah>0){
        echo "<script>alert('Username sudah ada, silahkan gunakan username lain');window.location='user.php'</script>";
    }else{
        $insert = "INSERT INTO users(username, password, nama_lengkap) VALUES ('$username', '$password', '$namaLengkap')";
        $query = mysqli_query($koneksi, $insert);
        var_dump($query);
        echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='user.php'</script>";
    }
?>
