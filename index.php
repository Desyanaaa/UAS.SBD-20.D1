<?php
include "koneksi.php";

$sql = "SELECT * FROM klinik_312010096";
$result = mysqli_query($koneksi, $sql);
 ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="assets/restaurant/i.png">
  <title>LOGIN</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css">
  <!-- Script: Make my navbar transparent when the document is scrolled to top -->
  <script src="js/navbar-ontop.js"></script>
  <!-- Script: Animated entrance -->
  <script src="js/animate-in.js"></script>
  <!-- Script: Format angka textbox -->
  <script type="text/javascript" src="js/my.js"></script>
  </head>

  <body>

  <!-- Cover -->
  <div class="align-items-center d-flex py-5 cover section-primary" style="background-image: url(&quot;assets/restaurant/bground.jpg&quot;);">
    <div class="container">
      <div class="col-lg">
        <h2 class="mb-0 mt-4 display-4" align="center">KLINIK UPB</h2><br>
      <div class="row">
        <div class="col-lg-7 align-self-center text-lg-left text-center">
          <h1 align="center">Silahkan Log in !</h1><br>
        </div>
</div>




<form method="post" name="login" action="login/cek_login.php">
<table align='center'>

<tr>
<td><font size=5><b>Username</b></font></td>
<td>:</td>
<td><input type="text" name="username" placeholder="username"><font color=#000000 size=2></font></td>
</tr>
<tr>
<td><font size=5><b>Password</b></font></td>
<td>:</td>
<td><input type="password" name="password" placeholder="password" required=""></td>
</tr>
<tr>
<td colspan=2></td>
<td><b><input type="submit" name="submit" value="LOGIN"></b></td>
</tr>
</table>


</form>

<script src="jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="bootstrap.min.js" crossorigin="anonymous" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="js/smooth-scroll.js"></script>


</body>

</html>
