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
	<br>
	<h1><center>LIST SURAT</center></h1>
	<br>
<table class="table text-center">
<!--   <thead class="table-dark"> -->
  	<?php
  		foreach ($result as $isi){
  			if($isi["jenis_surat"]=='1'){
  				$js = "Surat Keputusan";
  			}else if($isi["jenis_surat"]=='2'){
  				$js = "Surat Pernyataan";
  			}else if($isi["jenis_surat"]=='3'){
  				$js = "Surat Pemninjaman";
  			}else {
  				$js = "Kode Bermasalah";
  			}
  		?>
  	    <tr>
    	<td><?php echo $isi['no_surat'];?></td>
    	<td><?php echo $isi;?></td>
    	<td><?php echo $isi['tgl_surat'];?></td>
    	<td><?php echo $isi['ttd_surat'];?></td>
    </tr>
    <?php
	}
	?>
<!--     <td><b>NO SURAT</b></td>
    <td><b>NAMA</b></td>
    <td><b>ALAMAT</b></td>
    <td><b>NO HP</b></td> -->
  <!-- </thead> -->


<!--     <tr>
    	<td>202002050</td>
    	<td>Hilda Yuliani</td>
    	<td>Ciamis</td>
    	<td>087654786789</td>
    </tr>
    <tr>
    	<td>202002067</td>
    	<td>Fanny Fietya Herlambang</td>
    	<td>Rajapolah</td>
    	<td>082123978908</td>
    </tr>
    <tr>
    	<td>202002090</td>
    	<td>Siti Aas Latifah</td>
    	<td>Garut</td>
    	<td>081098675436</td>
    </tr>
    <tr>
    	<td>202002049</td>
    	<td>Adinda nur Aulia Rizki</td>
    	<td>Tasikmalaya</td>
    	<td>082123456789</td>
    </tr>
        <tr>
    	<td>202002062</td>
    	<td>Depa Melina</td>
    	<td>Tasikmalaya</td>
    	<td>089765345674</td>
    </tr> -->
  </tbody>
</table>
</div>
</body>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>