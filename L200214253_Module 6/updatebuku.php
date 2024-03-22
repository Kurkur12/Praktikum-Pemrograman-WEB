<html>
	<head>
		<title>Ubah Data Buku</title>
	</head>
	
    <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'informatika');

        $kodebuku = $_GET['kode_buku'];
        $cari = "SELECT * FROM buku WHERE kode_buku='$kodebuku'";
        $hasil_cari = mysqli_query($conn, $cari);
        $data = mysqli_fetch_array($hasil_cari);
    ?>
	
	<body>
		<center>
			<h3>Ubah Data Buku</h3>
			<table border='0' width='30%'>
				<form action="?kode_buku=<?php echo $kodebuku; ?>" method = 'POST'>
				
					<tr>
						<td width='25%'>Kode Buku</td>
						<td width='5%'>:</td>
						<td width='65%'> <input type="text" name='kode_buku' size='30' value="<?php echo $data['kode_buku'] ?>"> </td>
					</tr>
					
					<tr>
						<td width='25%'>Nama Buku</td>
						<td width='5%'>:</td>
						<td width='65%'> <input type="text" name='nama_buku' size='30' value="<?php echo $data['nama_buku'] ?>"> </td>
					</tr>
					
					<tr>
						<td width='25%'>Kode Jenis</td>
						<td width='5%'>:</td>
						<td width='65%'> <input type="text" name='kode_jenis' size='30' value="<?php echo $data['kode_jenis'] ?>"> </td>
					</tr>
					
					<tr>
						<td colspan="2"></td>
						<td><input type="submit" value='Ubah Data' name='submit'></td>
					</tr>
					
				</form>
			</table>
			
		<?php
			error_reporting(E_ALL^E_NOTICE);
			$kodebuku = $_POST['kode_buku'];
			$namabuku = $_POST['nama_buku'];
			$kodejenis = $_POST['kode_jenis'];
			$submit = $_POST['submit'];
			
			$input ="UPDATE `buku` SET `nama_buku`='$namabuku',`kode_jenis`='$kodejenis' WHERE kode_buku='$kodebuku'";
			
			if($submit){
				mysqli_query($conn,$input);
				echo "
					<script>
						alert('Data Berhasil Diubah!');
						document.location.href='buku.php';
					</script>";
			}

		?>

		<center>
			<br>
			<hr>
			<h3>Data Buku</h3>
			<table border='1' width='50%'>
				<tr>
					<td align='center' width='20%'><b>Kode Buku</b></td>
					<td align='center' width='30%'><b>Nama Buku</b></td>
					<td align='center' width='20%'><b>Kode Jenis</b></td>
					<td align='center' width='20%' colspan='2'><b>Keterangan</b></td>
				</tr>

				<?php
					$cari = "SELECT * FROM buku ORDER BY kode_buku";
					$hasil_cari = mysqli_query($conn, $cari);

					while ($data = mysqli_fetch_array($hasil_cari)) {
						echo "<tr>
									<td width='20%'>$data[0]</td>
									<td width='30%'>$data[1]</td>
									<td width='10%'>$data[2]</td>
									<td><a href='updatebuku.php?kode_gudang=$data[0]'>Ubah</a></td>
									<td><a href='deletebuku.php?kode_gudang=$data[0]'>Hapus</a></td>
									</tr>";
					}
				?>
			</table>
		</center>
	</body>
</html>