<?php
	$conn= mysqli_connect('localhost', 'root', '','informatika');
	
	$kodegudang = $_GET['kode_gudang'];
	$hapus="delete from gudang where kode_gudang = '$kodegudang'";
	$data=mysqli_query($conn,$hapus);
	
	if($data > 0){
		echo "
		<script>
		alert('data berhasil di hapus');
		document.location.href='formgudang.php';
		</script>";
	}else
		echo "
		<script>
		alert('data gagal di hapus');
		document.location.href='formgudang.php';
		</script>";
?>
