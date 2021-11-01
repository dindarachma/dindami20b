<?php
error_reporting(0);

//Buat Koneksinya
$con = new mysqli("localhost","root", "","pendaftaran_siswa");
$tgl = date ('d F Y');
$query = mysqli_query($con, 'SELECT * FROM tbl_agama');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<row>
		<div class="card">
		<H2 align="center">Tambah Siswa</H2>
		<div class="card-body">
			<form class="row g-3" action="form_daftar.php" method="post" name="form1">
			  <div class="col-md-6">
			    <label for="nisn" class="form-label">NISN</label>
			    <input type="text" class="form-control" id="nisn" name="nisn" required>
			  </div>
			   <div class="col-12">
			    <label for="Nama" class="form-label">NAMA</label>
			    <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama Lengkap" required>
			  </div>
			   <div class="col-12">
			    <label for="Alamat" class="form-label">ALAMAT</label>
			    <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat Lengkap" required>
			  </div>
			   <div class="col-12">
			    <label for="jnsKelamin" >JENIS KELAMIN</label>
			    <label><input type="radio"  id="jnsKelamin" name="jnsKelamin" value="Laki-laki" required>Laki-laki</label>
			    <label><input type="radio"  id="jnsKelamin" name="jnsKelamin" value="Perempuan" required>Perempuan</label>
			  </div>
			  <div class="col-md-6">
			    <label for="Agama" class="form-label">AGAMA</label>
			    <select id="Agama" name="Agama" class="form-select" required> 
			      <option selected>Silahkan Pilih...</option>
			      <?php
  					foreach ($query as $agm){
    				?>
			      <option value="<?=$agm['id']?>"><?=$agm['agama']?> </option>
			      <?php
			  }
			  ?>
			      
			    </select>
			  </div>
			  <div class="col-12">
			    <label for="SklhAsal" class="form-label">SEKOLAH ASAL</label>
			    <input type="text" class="form-control" id="SklhAsal" name="SklhAsal"  required>
			  </div>
			  <!-- <div class="col-md-6">
			    <label for="inputPassword4" class="form-label">Nomor Surat</label>
			    <input type="password" class="form-control" id="inputPassword4">
			  </div> -->
			  <!-- <div class="col-12">
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
			  </div> -->
			  
			  <div class="col-12">
			    <button type="submit" class="btn btn-primary" name="simpan">Daftar</button>
			    <button type="button" class="btn btn-danger">Batal</button>
			  </div>
			</form>
		</div>
		</div>
	</row>
	</div>
	<?php


		if(isset($_POST['simpan'])) {
			$NISN = $_POST['nisn'];
			$nama = $_POST['Nama'];
			$alamat = $_POST['Alamat'];
			$jenis_kelamin = $_POST['jnsKelamin'];
			$agama = $_POST['Agama'];
			$sekolah_asal = $_POST['SklhAsal'];

			//Insert user data info table
			$result = mysqli_query($con, "INSERT INTO `tbl_surat` (`id`, `NISN`, `nama`, `alamat`, `jenis_kelamin`, `agama`, `sekolah_asal`) VALUES ('', 'NISN','$nama','$alamat','$jenis_kelamin','$agama','$sekolah_asal')"); 

			//Show message when user added
			header("Location:list-siswa.php?pesan=success&&frm=add");
			/*echo "User added Successfully. <a href='form_daftar.php'>List Surat</a>";*/
		}
	?>
</body>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>

