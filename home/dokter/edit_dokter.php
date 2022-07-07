<?php

	include ("../../koneksi.php");
	$key = mysqli_real_escape_string($koneksi,$_GET['id_dokter']);

	$view_sp = mysqli_query($koneksi,"SELECT * FROM dokter WHERE id_dokter = '".$key."'");
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
	<title>Edit Dokter - Klinik</title>
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
					<h1 class="mb-0 mt-4 display-4">Klinik UPB (Edit Dokter)</h1>
				</div>
				<div class="col-lg-5 p-3" id="book">
					<form class="p-4 section-light bg-light" method="POST" name="exc" action="updateDokter.php?q=<?php echo $key ; ?>">
						<h4 class="mb-3 text-center">Edit Data Dokter</h4>
						<div class="form-group"> <label>Id Dokter</label>
							<input class="form-control" placeholder="Type here" name="textid" disabled="" value="<?php echo $call_sp['id_dokter'] ; ?>"> </div>
							<div class="form-group"><label>Nama Dokter</label>
							<input type="text" class="form-control" name="textnama" id="textnama"  value="<?php echo $call_sp['nama_dokter']; ?>"></td></div>
						<button name="exc" type="submit" class="btn mt-4 btn-block p-2 btn-secondary"><b>UPDATE DATA</b></button>
						<a href="dokter.php#menu" class="btn btn-default"> <i class="fa fa-times"></i> <class="btn btn-primary">Discard</a>
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
