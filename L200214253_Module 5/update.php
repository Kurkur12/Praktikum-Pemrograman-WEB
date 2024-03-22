<html>
	<head>
		<title>Ubah Data Gudang</title>
	</head>
	
    <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'informatika');

        $kodegudang = $_GET['kode_gudang'];
        $cari = "SELECT * FROM gudang WHERE kode_gudang='$kodegudang'";
        $hasil_cari = mysqli_query($conn, $cari);
        $data = mysqli_fetch_array($hasil_cari);
    ?>
	
	<body>
		<center>
			<h3>Ubah Data Gudang</h3>
			<table border='0' width='30%'>
				<form action="?kode_gudang=<?php echo $kodegudang; ?>" method = 'POST'>
				
					<tr>
						<td width='25%'>Kode Gudang</td>
						<td width='5%'>:</td>
						<td width='65%'> <input type="text" name='kode_gudang' size='30' value="<?php echo $data['kode_gudang'] ?>"> </td>
					</tr>
					
					<tr>
						<td width='25%'>Nama Gudang</td>
						<td width='5%'>:</td>
						<td width='65%'> <input type="text" name='nama_gudang' size='30' value="<?php echo $data['nama_gudang'] ?>"> </td>
					</tr>
					
					<tr>
						<td width='25%'>Lokasi</td>
						<td width='5%'>:</td>
						<td width='65%'> <input type="text" name='lokasi' size='30' value="<?php echo $data['lokasi'] ?>"> </td>
					</tr>
					
					<tr>
						<td colspan="2"></td>
						<td><input type="submit" value='Ubah Data' name='submit'></td>
					</tr>
					
				</form>
			</table>
			
		<?php
			error_reporting(E_ALL^E_NOTICE);
			$kodegudang = $_POST['kode_gudang'];
			$namagudang = $_POST['nama_gudang'];
			$lokasi = $_POST['lokasi'];
			$submit = $_POST['submit'];
			
			$input ="UPDATE `gudang` SET `nama_gudang`='$namagudang',`lokasi`='$lokasi' WHERE kode_gudang='$kodegudang'";
			
			if($submit){
				mysqli_query($conn,$input);
				echo "
					<script>
						alert('Data Berhasil Diubah!');
						document.location.href='formgudang.php';
					</script>";
			}

		?>

		<center>
			<br>
			<hr>
			<h3>Data Gudang</h3>
			<table border='1' width='50%'>
				<tr>
					<td align='center' width='20%'><b>Kode Gudang</b></td>
					<td align='center' width='30%'><b>Nama Gudang</b></td>
					<td align='center' width='20%'><b>Lokasi</b></td>
					<td align='center' width='20%' colspan='2'><b>Keterangan</b></td>
				</tr>

				<?php
					$cari = "SELECT * FROM gudang ORDER BY kode_gudang";
					$hasil_cari = mysqli_query($conn, $cari);

					while ($data = mysqli_fetch_array($hasil_cari)) {
						echo "<tr>
									<td width='20%'>$data[0]</td>
									<td width='30%'>$data[1]</td>
									<td width='10%'>$data[2]</td>
									<td><a href='update.php?kode_gudang=$data[0]'>Ubah</a></td>
									<td><a href='delete.php?kode_gudang=$data[0]'>Hapus</a></td>
									</tr>";
					}
				?>
			</table>
		</center>
	</body>
</html>