<?php
// Buat Koneksinya
error_reporting(0);

$con = new mysqli("localhost","root", "", "db_suratdinda");

$kota = "Tasikmalaya";
$instansi = array('LP3I', 'Kampus Tasikmalaya', '0265311766');
$barang = array('','Komputer', 'Proyektor', 'Camera', 'Aula', 'Lab Komputer');
$ttd = "Dinda Rachmayanti";

if ($con->connect_error) {
	die("<b>Yahh! Koneksi Database pertama 'db_suratdinda' gagal</b> : " . mysqli_connect_error()); 
	} 

else { 
	$sql = "SELECT * FROM tbl_surat where id ='2'";
	$query = mysqli_query($con, 'SELECT * FROM tbl_surat')
	$result = $con->query($sql);

	$isi = $result->fetch_assoc();
	$js = '';

	if ($isi["jenis_surat"]= 1) {
		$js = "Surat Keputusan";	
	}
	elseif ($isi["jenis_surat"]= 2) {
		$js = "Surat Pernyataan";
	}
	elseif ($isi["jenis_surat"]= 3) {
		$js = "Surat Peminjaman";
	}
	else ($isi["jenis_surat"]= 4) {
		die('Jenis Surat Tidak Terdaftar');
	}

	$surat

?>

<DOCTYPE html>
<html>
<head>
		<title>Surat Peminjaman</title>
<head>
<body>
	<table border="2">
		<tr>
			<td>
						<?php
			echo "<br>";
			echo "<center>" ."<b>" ."Surat Permohonan Peminjaman" ."</b>" ."</center>";
			echo "<br>";
			echo "<hr>";
			echo "<br>";
			echo $kota;
			echo ",";
			echo date('d F Y');
			echo "<br>";
			echo "<br>";
			echo "Nomor : .$js ";
			echo "<br>";
			echo "Perihal : Permohonan Peminjaman";
			echo "<br>";
			echo "Lampiran : -";
			echo "<br>";
			echo "<br>";
			echo "Kepada :";
			echo "<br>";
			for($x=0;$x<count($instansi);$x++){
			echo $instansi[$x]."<br/>";
}
			echo "<br>";
			echo "Dengan Hormat,";
			echo "<br>";
			echo "	Dengan surat ini saya atas nama Dinda Rachmayanti untuk permohonan peminjaman sebagai berikut :";
			echo "<br>";
			for($x=1;$x<count($barang);$x++){
			echo "$x." .$barang[$x]."<br/>";

		}
			echo "Atas perhatiannya saya mengucapkan Terima kasih. ";
			echo "<br>";
			echo "<br>";
			echo "Tanda Tangan";
			echo "<br>";
			echo "<br>";
			echo $ttd;
		?>
			</td>
		</tr>
	</table>
	
	
</body>
</html>
 
<!-- <?php
if ($db->connect_error) { 
	die("<b>Yahh! Koneksi Database pertama 'db_suratdinda' gagal</b> : " . mysqli_connect_error()); 
	} 

}else { 
	$sql = "SELECT * FROM tbl_surat";
	$query = mysqli_query($con, 'SELECT * FROM tbl_surat')
	$result = $conn->query($sql);

	$isi = $result->fetch_assoc();
	$isi2 = mysli_fetch_array($query);

	echo $isi["no_surat"];
	echo "<br>";
	echo "<br>";
	echo $isi2["no_surat"];

	if ($isi["jenis_surat"]="1") {
		js = "Surat Keputusan";	
	}
	elseif ($isi["jenis_surat"]="2") {
		js = "Surat Pernyataan";
	}
	elseif ($isi["jenis_surat"]="3") {
		js = "Surat Peminjaman";
	}
/*if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - No Surat: " . $row["no_surat]. "  . $row["jenis_surat"]. "<br>";
  }
} else {
  echo "0 results";
}*/


?> -->