<?php
$kota = "Tasikmalaya";
$instansi = array('LP3I', 'Kampus Tasikmalaya', '0265311766');
$barang = array('','Komputer', 'Proyektor', 'Camera', 'Aula', 'Lab Komputer');
$ttd = "Dinda Rachmayanti";
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
			echo "<center>" ."<b>" ."Surat Peminjaman" ."</b>" ."</center>";
			echo "<br>";
			echo $kota;
			echo ",";
			echo date('d F Y');
			echo "<br>";
			echo "<br>";
			echo "Nomor : 01-SP";
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
