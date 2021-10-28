<?php
error_reporting(0);
//Buat Koneksinya
$con = new mysqli("localhost","root", "","db_suratdinda");
$tgl = date ('d F Y');
$query = mysqli_query($con, 'SELECT * FROM tbl_jenis_surat');
/*$sql = "SELECT * FROM tbl_surat";*/
/*$result = $con->query($sql);*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Surat</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<row>
		<div class="card">
		<H2 align="center">Tambah Surat</H2>
		<div class="card-body">
			<form class="row g-3" action="add.php" method="post" name="form1">
			  <div class="col-md-6">
			    <label for="noSurat" class="form-label">Nomor Surat</label>
			    <input type="text" class="form-control" id="noSurat" name="noSurat" required>
			  </div>
			  <div class="col-md-6">
			    <label for="jenisSurat" class="form-label">Jenis Surat</label>
			    <select id="jenisSurat" name="jenisSurat" class="form-select" required> 
			      <option selected>Silahkan Pilih...</option>
			      <?php
  					foreach ($query as $js){
    				?>
			      <option value="<?=$js['id_js']?>"><?=$js['jenis_surat']?> </option>
			      <?php
			  }
			  ?>
			      
			    </select>
			  </div>
			  <!-- <div class="col-md-6">
			    <label for="inputPassword4" class="form-label">Nomor Surat</label>
			    <input type="password" class="form-control" id="inputPassword4">
			  </div> -->
			  <div class="col-12">
			    <label for="tglSurat" class="form-label">Tanggal Surat</label>
			    <input type="date" class="form-control" id="tglSurat" name="tglSurat" placeholder="mm/dd/yyyy" required>
			  </div>
			  <div class="col-12">
			    <label for="ttdSurat" class="form-label">Pembuat Surat</label>
			    <input type="text" class="form-control" id="ttdSurat" name="ttdSurat" placeholder="" required>
			  </div>
			  <div class="col-md-6">
			    <label for="ttdMengetahui" class="form-label">Mengetahui</label>
			    <input type="text" class="form-control" id="ttdMengetahui" name="ttdMengetahui" required>
			  </div>
			  
			  <div class="col-md-6">
			    <label for="ttdMenyetujui" class="form-label">Menyetujui</label>
			    <input type="text" class="form-control" id="ttdMenyetujui" name="ttdMenyetujui" required>
			  </div>
			  
			  <div class="col-12">
			    <button type="submit" class="btn btn-primary" name="simpan">Tambah</button>
			    <button type="button" class="btn btn-danger">Batal</button>
			  </div>
			</form>
		</div>
		</div>
	</row>
	</div>
	<?php


		if(isset($_POST['simpan'])) {
			$no_surat = $_POST['noSurat'];
			$jenis_surat = $_POST['jenisSurat'];
			$tgl_surat = $_POST['tglSurat'];
			$ttd_surat = $_POST['ttdSurat'];
			$ttd_mengetahui = $_POST['ttdMengetahui'];
			$ttd_menyetujui = $_POST['ttdMenyetujui'];

			//Insert user data info table
			$result = mysqli_query($con, "INSERT INTO `tbl_surat` (`id`, `no_surat`, `jenis_surat`, `tgl_surat`, `ttd_surat`, `ttd_mengetahui`, `ttd_menyetujui`) VALUES ('', '$no_surat','$jenis_surat','$tgl_surat','$ttd_surat','$ttd_mengetahui','$ttd_menyetujui')"); 

			//Show message when user added
			header("Location:view.php?pesan=success&&frm=add");
			/*echo "User added Successfully. <a href='view.php'>List Surat</a>";*/
		}
	?>
</body>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>

