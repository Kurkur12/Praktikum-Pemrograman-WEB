<!DOCTYPE html>
<html>
<head>
	<title>Fungsi Tanggal dan Waktu</title>
</head>
<body>

	<?php
	date_default_timezone_set("Asia/Jakarta");

	$jam = date("H:i:s A");
	$waktu = date("d-m-Y");
	$hari = date("l");
	$tanggal = date("d");
	$bulan = date("F");
	$tahun = date("Y");

	echo "Sekarang jam $jam<br>";
	echo "Sekarang tanggal $tanggal <br>";
	echo "Lebih detailnya hari $hari tanggal $tanggal bulan $bulan tahun $tahun";
	?>

</body>
</html>