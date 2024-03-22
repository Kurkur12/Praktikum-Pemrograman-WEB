<html>
	<head>
		<title>DATA GUDANG</title>
	</head>

	<?php
	$conn = mysqli_connect('localhost','root','','informatika');
	?>

	<body>
		<center>
			<h3>Tambah Data Gudang</h3>
				<table border='0' width='30%'>
					<form method='POST' action='formgudang.php'>
					
					<tr>
						<td width='25%'>Kode Gudang</td>
						<td width='5%'>:</td>
						<td width='65%'><input type='text' name='kode_gudang' size='30'></td>
					</tr>
					
					<tr>
						<td width='25%'>Nama Gudang</td>
						<td width='5%'>:</td>
						<td width='65%'><input type='text' name='nama_gudang' size='30'></td>
					</tr>
					
					<tr>
						<td width='25%'>Lokasi</td>
						<td width='5%'>:</td>
						<td width='65%'><input type='text' name='lokasi' size='30'></td>
					</tr>
					
				</table>
						<input type='submit' value='Tambah Data' name='submit'>
					
					</form>
			
		<?php
		
		error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
		$kodegudang = $_POST['kode_gudang'];
		$namagudang = $_POST['nama_gudang'];
		$lokasi = $_POST['lokasi'];
		$submit = $_POST['submit'];
		
		$input ="INSERT INTO gudang(kode_gudang, nama_gudang, lokasi) VALUES ('$kodegudang', '$namagudang', '$lokasi')";
		
		if($submit){
			if($kodegudang==''){
				echo "</br>Kode Gudang Tidak Boleh Kosong";
			}elseif($namagudang==''){
				echo "</br>Nama Gudang Tidak Boleh Kosong";
			}elseif($lokasi==''){
				echo "</br>Lokasi Gudang Tidak Boleh Kosong";
			}else{
				mysqli_query($conn,$input);
				echo'</br>Data Berhasil Ditambahkan';
			}
		}
		?>

		<hr>
			<h3>DATA GUDANG</h3>
			<table border='1' width='50%'>
			<tr>
				<td align='center' width='20%'><b>Kode Gudang</b></td>
				<td align='center' width='30%'><b>Nama Gudang</b></td>
				<td align='center' width='20%'><b>Lokasi</b></td>
				<td align='center' width='20%' colspan='2'><b>Keterangan</b></td>
			</tr>
			
		<?php

		$cari="SELECT * FROM gudang ORDER BY kode_gudang";
		$cari_data = mysqli_query($conn, $cari);
		
		while($data=mysqli_fetch_row($cari_data)){
			echo"<tr>
			<td width='20%'>$data[0]</td>
			<td width='30%'>$data[1]</td>
			<td width='20%'>$data[2]</td>
			<td><a href='update.php?kode_gudang=$data[0]'>Ubah</a></td> 
			<td><a href='delete.php?kode_gudang=$data[0]'>Hapus</a></td>
			</tr>";
		}
		?>
		
			</table>
		</center>
	</body>
</html>

