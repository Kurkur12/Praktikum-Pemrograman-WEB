<html>
	<head>
		<title>JENIS BUKU</title>
	</head>

	<?php
	$conn = mysqli_connect('localhost','root','','informatika');
	?>

	<body>
		<center>
			<h3>Tambah Data JENIS BUKU</h3>
				<table border='0' width='30%'>
					<form method='POST' action='jenisbuku.php'>
					
					<tr>
						<td width='25%'>Kode Jenis</td>
						<td width='5%'>:</td>
						<td width='65%'><input type='text' name='kode_jenis' size='30'></td>
					</tr>
					
					<tr>
						<td width='25%'>Nama Jenis</td>
						<td width='5%'>:</td>
						<td width='65%'><input type='text' name='nama_jenis' size='30'></td>
					</tr>
					
					<tr>
						<td width='25%'>Keterangan Jenis</td>
						<td width='5%'>:</td>
						<td width='65%'><input type='text' name='keterangan_jenis' size='30'></td>
					</tr>
					
				</table>
						<input type='submit' value='Tambah Data' name='submit'>
					
					</form>
			
		<?php
		
		error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
		$kodejenis = $_POST['kode_jenis'];
		$namajenis = $_POST['nama_jenis'];
		$keteranganjenis = $_POST['keterangan_jenis'];
		$submit = $_POST['submit'];
		
		$input ="INSERT INTO jenisbuku(kode_jenis, nama_jenis, keterangan_jenis) VALUES ('$kodejenis', '$namajenis', '$keteranganjenis')";
		
		if($submit){
			if($kodejenis==''){
				echo "</br>Kode Jenis Tidak Boleh Kosong";
			}elseif($namajenis==''){
				echo "</br>Nama Jenis Tidak Boleh Kosong";
			}elseif($keteranganjenis==''){
				echo "</br>Keterangan Jenis Tidak Boleh Kosong";
			}else{
				mysqli_query($conn,$input);
				echo'</br>Data Berhasil Ditambahkan';
			}
		}
		?>

		<hr>
			<h3>DATA  JENIS BUKU </h3>
			<table border='1' width='50%'>
			<tr>
				<td align='center' width='20%'><b>Kode Jenis</b></td>
				<td align='center' width='30%'><b>Nama Jenis</b></td>
				<td align='center' width='20%'><b>keterangan Jenis</b></td>
				<td align='center' width='20%' colspan='2'><b>Keterangan</b></td>
			</tr>
			
		<?php

		$cari="SELECT * FROM jenisbuku ORDER BY kode_jenis";
		$cari_data = mysqli_query($conn, $cari);
		
		while($data=mysqli_fetch_row($cari_data)){
			echo"<tr>
			<td width='20%'>$data[0]</td>
			<td width='30%'>$data[1]</td>
			<td width='20%'>$data[2]</td>
			<td><a href='updatejenis.php?kode_jenis=$data[0]'>Ubah</a></td> 
			<td><a href='deletejenis.php?kode_jenis=$data[0]'>Hapus</a></td>
			</tr>";
		}
		?>
		
			</table>
		</center>
	</body>
</html>

