<html>
	<head>
		<title>DATA BUKU</title>
	</head>

	<?php
	$conn = mysqli_connect('localhost','root','','informatika');
	?>

	<body>
		<center>
			<h3>Tambah Data BUKU</h3>
				<table border='0' width='30%'>
					<form method='POST' action='buku.php'>
					
					<tr>
						<td width='25%'>Kode Buku</td>
						<td width='5%'>:</td>
						<td width='65%'><input type='text' name='kode_buku' size='30'></td>
					</tr>
					
					<tr>
						<td width='25%'>Nama Buku</td>
						<td width='5%'>:</td>
						<td width='65%'><input type='text' name='nama_buku' size='30'></td>
					</tr>
					
					<tr>
						<td width='25%'>Kode Jenis</td>
						<td width='5%'>:</td>
						<td width='65%'><input type='text' name='kode_jenis' size='30'></td>
					</tr>
					
				</table>
						<input type='submit' value='Tambah Data' name='submit'>
					
					</form>
			
		<?php
		
		error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
		$kodebuku = $_POST['kode_buku'];
		$namabuku = $_POST['nama_buku'];
		$kodejenis = $_POST['kode_jenis'];
		$submit = $_POST['submit'];
		
		$input ="INSERT INTO buku(kode_buku, nama_buku, kode_jenis) VALUES ('$kodebuku', '$namabuku', '$kodejenis')";
		
		if($submit){
			if($kodebuku==''){
				echo "</br>Kode Buku Tidak Boleh Kosong";
			}elseif($namabuku==''){
				echo "</br>Nama Buku Tidak Boleh Kosong";
			}elseif($kodejenis==''){
				echo "</br>Kode Jenis Tidak Boleh Kosong";
			}else{
				mysqli_query($conn,$input);
				echo'</br>Data Berhasil Ditambahkan';
			}
		}
		?>

		<hr>
			<h3>DATA BUKU </h3>
			<table border='1' width='50%'>
			<tr>
				<td align='center' width='20%'><b>Kode Buku</b></td>
				<td align='center' width='30%'><b>Nama Buku</b></td>
				<td align='center' width='20%'><b>Kode Jenis</b></td>
				<td align='center' width='20%' colspan='2'><b>Keterangan</b></td>
			</tr>
			
		<?php

		$cari="SELECT * FROM buku ORDER BY kode_buku";
		$cari_data = mysqli_query($conn, $cari);
		
		while($data=mysqli_fetch_row($cari_data)){
			echo"<tr>
			<td width='20%'>$data[0]</td>
			<td width='30%'>$data[1]</td>
			<td width='20%'>$data[2]</td>
			<td><a href='updatebuku.php?kode_buku=$data[0]'>Ubah</a></td> 
			<td><a href='deletebuku.php?kode_buku=$data[0]'>Hapus</a></td>
			</tr>";
		}
		?>
		
			</table>
		</center>
	</body>
</html>

