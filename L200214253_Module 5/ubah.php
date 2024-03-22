<html>
<head>
    <title>Ubah-Data Mahasiswa</title>
</head>

<?php 
$conn = mysqli_connect('localhost', 'root', '', 'informatika');
$nim = $_GET['nim'];
$cari = "SELECT * FROM mahasiswa WHERE NIM='$nim'";
$hasil_cari = mysqli_query($conn, $cari);
$data = mysqli_fetch_array($hasil_cari);

function active_radio_button($value, $input) {
    // apabila value dari radio = yang diinput
    $result = $value == $input?'checked':'';
    return $result;
    }
    if($data>0) {
?>
        

<body>
    <center>
        <h3>Ubah Data Mahasiswa</h3>
        <table border='0' width='30%'>
            <form action="?nim=<?php echo $nim; ?>" method = 'POST'>
                <tr>
                    <td width='25%'>NIM</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <input type="text" name='nim' size='10' value="<?php echo $data['NIM'] ?>">
                    </td>
                </tr>

                <tr>
                    <td width='25%'>Nama</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <input type="text" name='nama' size='30' value="<?php echo $data['Nama'] ?>">
                    </td>
                </tr>

                <tr>
                    <td width='25%'>Kelas</td>
                    <td width='5%'>:</td>
                    <td width='65%'> 
                        <input type="radio" name='kelas' value='A' <?php echo active_radio_button("A",  $data['Kelas'])?>> A
                        <input type="radio" name='kelas' value='B' <?php echo active_radio_button("B",  $data['Kelas'])?>> B
                        <input type="radio" name='kelas' value='C' <?php echo active_radio_button("C",  $data['Kelas'])?>> C 
                    </td>
                </tr>

                <tr>
                    <td width='25%'>Alamat</td>
                    <td width='5%'>:</td>
                    <td width='65%'>
                        <input type="text" name='alamat' size='40' value="<?php echo $data['Alamat'] ?>"> 
                    </td>
                </tr>
            </table>
            <input type="submit" value='Ubah Data' name='submit'></td>     
        </form>

<?php
error_reporting(E_ALL ^E_WARNING ^E_NOTICE);
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$submit = $_POST['submit'];
$input="UPDATE `mahasiswa` SET `Nama`='$nama',`Kelas`='$kelas',`Alamat`='$alamat' WHERE NIM='$nim'";
if($submit){
    if($nim==''){
        echo "</br> NIM tidak boleh kosong, diisi dulu";
    }elseif($nama==''){
        echo "</br> Nama tidak boleh kosong, diisi dulu";
    }elseif($alamat==''){
        echo "</br> Alamat tidak boleh kosong, diisi dulu";
    }else{
        mysqli_query($conn,$input);
        echo "
        <script>
            alert('Data Berhasil Diubah!');
            document.location.href='form.php';
        </script>";
    }
}
}
?>

<center>
    <hr>
    <h3>Data Mahasiswa</h3>
    <table border="1" width='50%'>
        <tr>
            <td width="20%" align="center"><b>NIM</b></td>
            <td width="30%" align="center"><b>Nama</b></td>
            <td width="10%" align="center"><b>Kelas</b></td>
            <td width="30%" align="center"><b>Alamat</b></td>
            <td width="10%" colspan="2" align="center"><b>Keterangan</b></td>
        </tr>


<?php
$cari = "SELECT * FROM mahasiswa order by NIM";
$hasil_cari = mysqli_query($conn, $cari);
// mengambil satu array dari tabel mahasiswa
// fungsi ini akan mengembalikan nilai false dibaris array terakhir

while ($data = mysqli_fetch_array($hasil_cari)) {
    echo "<tr>
            <td width='20%'>$data[0]</td>
            <td width='30%'>$data[1]</td>
            <td width='10%'>$data[2]</td>
            <td width='30%'>$data[3]</td>
            <td><a href='ubah.php?nim=$data[1]'>Ubah</a></td>
        </tr>";
}
?>

        </table>
    </center>
</body>
</html>