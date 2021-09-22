<?php  
$nama = "Dinda Rachmayanti";
$alamat = "Tasikmalaya";
$no_hp = "089516203289";
$matkul = array('','Web Programming','System Design Analysis','Java Programming');
?>
<DOCTYPE html>
<html>
<head>
		<title>Week 2 - Dinda Rachmayanti</title>
<head>
<body>
		<?php
			echo "~~~~~~~~~~~~~";
			echo "BIODATA";
			echo "~~~~~~~~~~~~~";
			echo "<br>";
			echo "<br>";
			echo "Nama : ".$nama;
			echo "<br>";
			echo "Alamat : ".$alamat;
			echo "<br>";
			echo "NO HP : ".$no_hp; 
			echo "<br>";
			echo "Saya Mengambil mata kuliah sebagai berikut : ";
			echo "<br>";
			for($x=1;$x<count($matkul);$x++){
			echo "$x." .$matkul[$x]."<br/>";
}
		?>
</body>
</html>
