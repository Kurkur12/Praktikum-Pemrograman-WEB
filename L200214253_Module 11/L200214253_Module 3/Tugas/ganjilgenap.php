<!DOCTYPE html>
<html>
<head>
	<title>Program Ganjil & Genap</title>
</head>
<body>
	<h1>Program Menentukan Angka Ganjil dan Genap</h1>
	<form method="POST" action="ganjilgenap.php">
		
		<p>Bilangan anda : <input type="text" name="bilangan"></p>
		<p><input type="submit" name="submit" value="Cek"></p>

	</form>

<?php

error_reporting(E_ALL ^ E_NOTICE);

$bilangan = $_POST["bilangan"];
$submit = $_POST["submit"];

if ($submit) {
	if ($bilangan % 2 == 0) {
	echo "Bilangan $bilangan adalah bilangan genap";
	}
	else{
	echo "Bilangan $bilangan adalah bilangan ganjil";
	}
}

?>

</body>
</html>