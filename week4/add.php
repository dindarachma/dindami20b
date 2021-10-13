<?php
error_reporting(0);
//buat koneksi
$con = new mysqli("localhost","root","","db_suratdinda");

$tgl = date('d F Y');

$sql = "SELECT * FROM tbl_surat";
$result = $con->query($sql);
/*$isi = $result->fetch_assoc();*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Surat</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivrnet/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<row>
			<div class="card">
				<H2 align="center">Tambah Surat</H2>
				<div class="card-body">
						<form class="row g-3">
						  <div class="col-md-6">
						    <label for="inputEmail4" class="form-label">Nomor Surat</label>
						    <input type="email" class="form-control" id="inputEmail4">
						  </div>
						  <div class="col-md-6">
						    <label for="inputPassword4" class="form-label">Password</label>
						    <input type="password" class="form-control" id="inputPassword4">
						  </div>
						  <div class="col-12">
						    <label for="inputAddress" class="form-label">Address</label>
						    <input type="text" class="form-control" id="inputAddress" placeholder="dd/mm/yyyy">
						  </div>
						  <div class="col-12">
						    <label for="inputAddress2" class="form-label">Address 2</label>
						    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
						  </div>
						  <div class="col-md-6">
						    <label for="inputCity" class="form-label">City</label>
						    <input type="text" class="form-control" id="inputCity">
						  </div>
						  <div class="col-md-4">
						    <label for="inputState" class="form-label">Jenis Surat</label>
						    <select id="inputState" class="form-select">
						      <option selected>Choose...</option>
						      <option>Surat Keputusan</option>
						      <option>Surat Peminjaman</option>
						      <option>Surat </option>
						    </select>
						  </div>
						  <div class="col-md-2">
						    <label for="inputZip" class="form-label">Zip</label>
						    <input type="text" class="form-control" id="inputZip">
						  </div>
						  <div class="col-12">
						    <div class="form-check">
						      <input class="form-check-input" type="checkbox" id="gridCheck">
						      <label class="form-check-label" for="gridCheck">
						        Check me out
						      </label>
						    </div>
						  </div>
						  <div class="col-12">
						    <button type="submit" class="btn btn-primary">Sign in</button>
						  </div>
						</form>	
				</div>
			</div>
		</row>
	</div>
	<?php

	if(isset($_POST['submit'])){
		$no_surat = $_POST['noSurat'];
		$Jenis_surat = $_POST['JenisSurat'];
		$tgl_surat = $_POST['tglSurat'];
		$ttd_surat = $_POST['ttdSurat'];
		$ttd_mengetahui = $_POST['ttdMengetahui'];
		$ttd_menyetujui = $_POST['ttdMenyetujui'];

		//insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO tbl_surat(id,no_surat,Jenis_surat,ttd_surat,ttd_mengetahui,ttd_menyetujui) VALUES('','$no_surat','$Jenis_surat','$tgl_surat','$ttd_surat','ttd_mengetahui','ttd_menyetujui')");

		//show message when user 
		echo "User Added Succesfully. <a href='view.php'>List Surat</a>";
	

	}
	?>
</body>

<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>