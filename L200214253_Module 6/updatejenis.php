<html>
	<head>
		<title>Ubah Data Jenis Buku</title>
	</head>
	
    <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'informatika');

        $kodejenis = $_GET['kode_jenis'];
        $cari = "SELECT * FROM jenisbuku WHERE kode_jenis='$kodejenis'";
        $hasil_cari = mysqli_query($conn, $cari);
        $data = mysqli_fetch_array($hasil_cari);
    ?>
	
	<body>
		<center>
			<h3>Ubah Data  Jenis Buku</h3>
			<table border='0' width='30%'>
				<form action="?kode_jenis=<?php echo $kodejenis; ?>" method = 'POST'>
				
					<tr>
						<td width='25%'>Kode Jenis</td>
						<td width='5%'>:</td>
						<td width='65%'> <input type="text" name='kode_jenis' size='30' value="<?php echo $data['kode_jenis'] ?>"> </td>
					</tr>
					
					<tr>
						<td width='25%'>Nama Jenis</td>
						<td width='5%'>:</td>
						<td width='65%'> <input type="text" name='nama_jenis' size='30' value="<?php echo $data['nama_jenis'] ?>"> </td>
					</tr>
					
					<tr>
						<td width='25%'>Keterangan Jenis</td>
						<td width='5%'>:</td>
						<td width='65%'> <input type="text" name='keterangan_jenis' size='30' value="<?php echo $data['keterangan_jenis'] ?>"> </td>
					</tr>
					
					<tr>
						<td colspan="2"></td>
						<td><input type="submit" value='Ubah Data' name='submit'></td>
					</tr>
					
				</form>
			</table>
			
		<?php
			error_reporting(E_ALL^E_NOTICE);
			$kodejenis = $_POST['kode_jenis'];
			$namajenis = $_POST['nama_jenis'];
			$keteranganjenis = $_POST['keterangan_jenis'];
			$submit = $_POST['submit'];
			
			$input ="UPDATE `jenisbuku` SET `nama_jenis`='$namajenis',`keterangan_jenis`='$keteranganjenis' WHERE kode_jenis='$kodejenis'";
			
			if($submit){
				mysqli_query($conn,$input);
				echo "
					<script>
						alert('Data Berhasil Diubah!');
						document.location.href='jenisbuku.php';
					</script>";
			}

		?>

		<center>
			<br>
			<hr>
			<h3>Data Jenis Buku</h3>
			<table border='1' width='50%'>
				<tr>
					<td align='center' width='20%'><b>Kode Jenis</b></td>
					<td align='center' width='30%'><b>Nama Jenis</b></td>
					<td align='center' width='20%'><b>Keterangan Jenis</b></td>
					<td align='center' width='20%' colspan='2'><b>Keterangan</b></td>
				</tr>

				<?php
					$cari = "SELECT * FROM jenisbuku ORDER BY kode_jenis";
					$hasil_cari = mysqli_query($conn, $cari);

					while ($data = mysqli_fetch_array($hasil_cari)) {
						echo "<tr>
									<td width='20%'>$data[0]</td>
									<td width='30%'>$data[1]</td>
									<td width='10%'>$data[2]</td>
									<td><a href='updatejenis.php?kode_jenisbuku=$data[0]'>Ubah</a></td>
									<td><a href='deletejenis.php?kode_jenisbuku=$data[0]'>Hapus</a></td>
									</tr>";
					}
				?>
			</table>
		</center>
	</body>
</html>