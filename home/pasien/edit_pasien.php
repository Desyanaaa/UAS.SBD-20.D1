<?php

	include ("../../koneksi.php");
	$key = mysqli_real_escape_string($koneksi, $_GET['id_pasien']);

	$view_sp = mysqli_query($koneksi,"SELECT * FROM pasien WHERE id_pasien='".$key."'");
	$call_sp = mysqli_fetch_array($view_sp);

	if(mysqli_num_rows($view_sp) == 0){
	}else{

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../../assets/restaurant/i.png">
	<title>Edit Pasien - Klinik</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="../../font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="../../theme.css" type="text/css">
	<script src="../../js/navbar-ontop.js"></script>
	<script src="../../js/animate-in.js"></script>
	<script type="text/javascript" src="../../js/my.js"></script>
</head>

<body>
	<?php include '../main/nav.php';?>

	<!-- Cover -->
	<div class="align-items-center d-flex py-5 cover section-primary" style="background-image: url(&quot;../../assets/restaurant/bground.jpg&quot;);">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 align-self-center text-lg-left text-center">
					<h1 class="mb-0 mt-4 display-4">Klinik UPB (Edit Pasien)</h1>
				</div>
				<div class="col-lg-5 p-3" id="book">
					<form class="p-4 section-light bg-light" method="POST" name="exc" action="updatePasien.php?q=<?php echo $key ; ?>">
						<h4 class="mb-3 text-center">Edit Data Pasien</h4>
						<div class="form-group">
							<label>Id Pasien</label>
							<input class="form-control" placeholder="Type here" name="textid" disabled="" value="<?php echo $call_sp['id_pasien'] ; ?>">
						</div>

					<br>

						<div class="form-group">
							<label>Nama Pasien</label>
							<input type="text" class="form-control" name="textnama" id="textnama" value="<?php echo $call_sp['nama_pasien']; ?>">
						</div>

						<br>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control" name="jenisKelamin" required>
								<option>--- Jenis Kelamin ---</option>
								<option value="Laki-Laki" <?= (strtolower($call_sp['jenis_kelamin']) == 'laki-laki') ? 'selected':''; ?>>Laki-Laki</option>
								<option value="Perempuan" <?= (strtolower($call_sp['jenis_kelamin']) == 'perempuan') ? 'selected':''; ?>>Perempuan</option>
							</select>
						</div>

						<br>

						<div class="form-group">
							<label>Umur</label>
							<input required type="text" class="form-control" placeholder="100" name="umur" id="umur" value="<?php echo $call_sp['umur']; ?>">
						</div>
						<button name="exc" type="submit" class="btn mt-4 btn-block p-2 btn-secondary"><b>UPDATE DATA</b></button>
						<a href="pasien.php#menu" class="btn btn-default"> <i class="fa fa-times"></i> <class="btn btn-primary">Discard</a>
					</form>
				</div>
			</div>
		</div>
	</div>
<script src="../../jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="../../popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../../bootstrap.min.js" crossorigin="anonymous" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"></script>
	<!-- Script: Smooth scrolling between anchors in the same page -->
	<script src="../../js/smooth-scroll.js"></script>

</body>

</html>
<?php } ?>
