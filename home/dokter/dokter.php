<?php include ('../../koneksi.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- PAGE settings -->
	<link rel="icon" href="../../assets/restaurant/i.png">
	<title>Dokter - Klinik</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<!-- CSS dependencies -->
	<link rel="stylesheet" href="../../font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="../../theme.css" type="text/css">
	<!-- Script: Make my navbar transparent when the document is scrolled to top -->
	<script src="../../js/navbar-ontop.js"></script>
	<!-- Script: Animated entrance -->
	<script src="../../js/animate-in.js"></script>
	<!-- Script: Format angka textbox -->
	<script type="text/javascript" src="../../js/my.js"></script>
</head>

<body>
	<!-- Navbar -->
	<?php include '../main/nav.php';?>
	
	<div class="align-items-center d-flex py-5 cover section-primary" style="background-image: url(&quot;../../assets/restaurant/bground.jpg&quot;);">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 align-self-center text-lg-left text-center">
					<h1 class="mb-0 mt-4 display-4">Klinik UPB</h1>
				</div>
				<div class="col-lg-5 p-3" id="book">
					<?php
					$s = "SELECT id_dokter FROM dokter order by id_dokter desc limit 1";
					$r = mysqli_query($koneksi, $s);
					$a = mysqli_fetch_array($r);
					$b = mysqli_num_rows($r);

					if ($b>0){
						$d = $a['id_dokter'];
						$c= $d+1;
					}else {
						$c = "31";
					}
?>
						<form enctype="multipart/form-data" class="p-4 section-light bg-light" method="POST" action="add_dokter.php">
							<h4 class="mb-3 text-center">Input Data Dokter</h4>
					<div class="form-group"><label>Id Dokter</label>
						<input type="text" disabled="" class="form-control" placeholder="Type here" value="<?php echo $c; ?>" > </div>
						<input type="hidden" class="form-control" placeholder="Type here" name="textid" value="<?php echo $c; ?>" >
								<div class="form-group"> <label>Nama Dokter</label>
								<input type="text" class="form-control" placeholder="Type here" name="textnama"> </div>
							<button type="submit" class="btn mt-4 btn-block p-2 btn-secondary"><b>Create</b></button>
							<a href="dokter.php#menu" class="btn btn-default"> <i class="fa fa-times"></i><class="btn btn-primary">Discard</a>
						</form></div>
				</div>
			</div>
		</div>
		<div class="container">
	<div class="py-5" id="menu">
			<div class="row">
				<div class="col-md-12">
					<h1 class="">Data Dokter</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table id="cari" class="table">
					<thead>
							<tr>
								<th>No.</th>
								<th>Id</th>
								<th>Nama</th>
								<th colspan="2"></th>
							</tr>
						</thead>
						<tbody>
							<?php
							include ("../../koneksi.php");
							/** Menampilkan data dengan halaman */
							$halaman = 10;
							$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							$sql = "SELECT * FROM dokter";
							$result = mysqli_query($koneksi, $sql);
							$total = mysqli_num_rows($result);
							$pages = ceil($total/$halaman);
							$no =$mulai+1;
							while($data = mysqli_fetch_array($result)){
								echo "
								<tr>
								<td>$no</td>
								<td>$data[id_dokter]</td>
								<td>$data[nama_dokter]</td>
								<td>
									<a class='btn navbar-btn btn-success ' href='edit_dokter.php?id_dokter=".$data['id_dokter']."'>Edit</a>
									<a class='btn navbar-btn btn-primary' href='hapus_dokter.php?id_dokter=$data[id_dokter]' onclick=\"return confirm('Yakin data $data[nama_dokter] akan dihapus ??')\">Delete</a>
								</td>
								</tr>";
									$no++;
							}

						?>

						</tbody>
						</table>
						<div class="menu">
						<ul>
						<p><button><li><a href="excel_dokter.php" target="_blank">REPORT EXCEL</a></li></button></p>
						<ul></div>
						<div class="py-5 text-center bg-light">
						<h5>Page : </h5>
						<?php for ($pageee=1; $pageee<=$pages ; $pageee++) { ?>
						<a class='btn navbar-btn btn-secondary' href="?halaman=<?php echo $pageee; ?>"><?php echo $pageee; ?></a>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
		</div>

	<div class="text-center bg-dark pt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-3">
					<h2 class="mb-4">Contact</h2>
					<p class="m-0">
						<a href="tel:+022 - 222 550 5550" class="text-white">T</a>elephone +022 - 222 550 5550</p>
					<p>
						<a href="mailto:info@pingendo.com" class="text-white">F</a>axsimile 0286-5985 374</p>
				</div>
				<div class="col-md-4 p-3">
					<h2 class="mb-4">Location</h2>
					<p>Jl. Raya Ciantra No.122 Cikarang, Bekasi, Kode Pos 53471</p>
				</div>
				<div class="col-md-4 p-3">
					<h2 class="mb-4">Klinik UPB</h2>
					<p>Operation
						<br>Monday-Saturday / 08:00-21:00</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mt-3">
					<p class="text-center text-muted">© Copyright 2018 Desyana Ajeng Windy Indriyani - All rights reserved. </p>
				</div>
			</div>
		</div>
	</div>

	<!-- JavaScript dependencies -->
	<script src="../../jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="../../popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="../../bootstrap.min.js" crossorigin="anonymous" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"></script>
	<!-- Script: Smooth scrolling between anchors in the same page -->
	<script src="../../js/smooth-scroll.js"></script>


</body>

</html>
