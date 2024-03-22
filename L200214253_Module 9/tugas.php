<?php
    session_start();
    error_reporting(0);
    $koneksi = mysqli_connect('localhost','root','','prakpwd');

    $username=$_POST['username'];
    $password=$_POST['password'];
    $submit=$_POST['submit'];

    if($submit){
        $sql="select * from user where Username='$username' and Password='$password'";
        $query=mysqli_query($koneksi,$sql);
        $cek=mysqli_num_rows($query);
        if($cek>0){
            $row = mysqli_fetch_assoc($query);
            if($row['status']=='Administrator'){
                $_SESSION['username']=$row['username'];
                $_SESSION['status']='Administrator';
                header("location:admin.php");
            }elseif($row['status']=='Member'){
                $_SESSION['username']=$row['username'];
                $_SESSION['status']='Member';
                header("location:member.php");
            }
        }else{
            echo "<script>
                    alert('Login Gagal, silahkan coba lagi');
                    document.location='tugas.php';
                  </script>";
        }
    }
?>
<!--<form method='POST' action='login.php'>
    <p align='center'>
        Username : <input type="text" name="username" id="username"><br>
        Password : <input type="password" name="password" id="password">
        <input type="submit" value="submit" name="submit">
    </p>
</form>-->
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="coba.css" type="text/css">
</head>
<body>
    <center>
    <br>
    <h1>Selamat Datang</h1>
    <div class="kotak_login">
        <p class="tulisan_login">Silakan melakukan Log In</p>
        <form action="tugas.php" method="POST">
            <table>
            <tr><td>Username : </td>
            <td><input type="text" name="username" id="username" class="form_login" placeholder="Masukan Username .."></td>
            </tr>
            <tr><td>Password : </td>
            <td><input type="password" name="password" id="password" class="form_login" placeholder="Masukan Password .."></td>
            </tr>
            <tr><td><input type="submit" value="Log-In" name="submit" id="submit" class="tombol_login"></td></tr>
            </table>
        </form>
    </div>
    </center>
</body>
</html>