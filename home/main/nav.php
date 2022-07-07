<?php 
	session_start();
	if($_SESSION['logged']!="1"){
		header("location:../../index.php?pesan=belum_login");
	}
?>

<nav class="navbar navbar-expand-md bg-primary navbar-light fixed-top">
		<div class="container">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse text-right justify-content-right" id="navbar3SupportedContent">
				<a href="../home.php"><img alt="HOME" src="../../assets/restaurant/home.png"></a>
					<div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
						<ul class="navbar-nav">
							<a class="btn navbar-btn btn-secondary mx-2" href="../../login/logout.php">SIGN OUT</a>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>DATA</b></a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="../user/user.php">DATA USER</a>
									<a class="dropdown-item" href="../dokter/dokter.php">DATA DOKTER</a>
									<a class="dropdown-item" href="../pasien/pasien.php">DATA PASIEN</a>
									<a class="dropdown-item" href="../obat/obat.php">DATA OBAT</a>
									<a class="dropdown-item" href="../log-obat/log-obat.php">LOG EDIT OBAT</a>
									<a class="dropdown-item" href="../berobat/berobat.php">DATA BEROBAT</a>
									<a class="dropdown-item" href="../resep/resep.php">DATA RESEP</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>INPUT DATA</b></a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="../user/user.php#book">DATA USER</a>
									<a class="dropdown-item" href="../dokter/dokter.php#book">DATA DOKTER</a>
									<a class="dropdown-item" href="../pasien/pasien.php#book">DATA PASIEN</a>
									<a class="dropdown-item" href="../obat/obat.php#book">DATA OBAT</a>
									<a class="dropdown-item" href="../log-obat/log-obat.php#book">LOG EDIT OBAT</a>
									<a class="dropdown-item" href="../berobat/berobat.php#book">DATA BEROBAT</a>
									<a class="dropdown-item" href="../resep/resep.php#book">DATA RESEP</a>

								</div>
							</li>
						</ul>
					</div>
				</div>
	</nav>