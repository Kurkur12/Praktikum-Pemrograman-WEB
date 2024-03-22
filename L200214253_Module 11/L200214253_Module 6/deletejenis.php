<?php
	$conn= mysqli_connect('localhost', 'root', '','informatika');
	
	$kodejenis = $_GET['kode_jenis'];
	$hapus="delete from jenisbuku where kode_jenis = '$kodejenis'";
	$data=mysqli_query($conn,$hapus);
	
	if($data > 0){
		echo "
		<script>
		alert('data berhasil di hapus');
		document.location.href='jenisbuku.php';
		</script>";
	}else
		echo "
		<script>
		alert('data gagal di hapus');
		document.location.href='jenisbuku.php';
		</script>";
?>