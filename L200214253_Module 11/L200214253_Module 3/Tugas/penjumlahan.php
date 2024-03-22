<!DOCTYPE html>
<html>
<head>
	<title>Program Penjumlahan</title>
</head>
<body>

	<form method="POST" action="penjumlahan.php">
		
		<p>Nilai A adalah <input type="text" name="nilaiA" size="1"></p>
		<p>Nilai B adalah <input type="text" name="nilaiB" size="1"></p>
		<p><input type="submit" name="submit" value="Jumlahkan"></p>
	
	</form>

<?php

error_reporting(E_ALL ^ E_NOTICE);
$nilaiA = $_POST["nilaiA"];
$nilaiB = $_POST["nilaiB"];
$submit = $_POST["submit"];

if ($submit) {
	echo "Nilai A adalah $nilaiA <br>";
	echo "Nilai B adalah $nilaiB <br>";
	echo "Jadi nilai A ditambah nilai B adalah " .($nilaiA + $nilaiB);
}


?>

</body>
</html>