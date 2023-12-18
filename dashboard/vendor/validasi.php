<?php

// untuk memvalidasi inputan pada web dengan field yang ada pada tabel database 
session_start();
include "konek.php";
$username = $_POST['usernameDiweb'];
$pass = $_POST['passwordDiweb'];

if (empty($username)){ //kondisi untuk username kosong
	$_SESSION['info'] = 'Username dan Password Tidak Boleh Kosong';
	header("Location: ../login.php"); //kembali pada halaman login
	exit(); //akhir sesi
} else {
	if (empty ($pass)) { //kondisi untuk password kosong
		$_SESSION['info'] = 'Username dan Password Tidak Boleh Kosong';
		header("Location: ../login.php");
		exit();
	} else {
		$sql = "SELECT * FROM tb_akun WHERE Nama_Akun LIKE '$username' AND Pass like '$pass' ";
        $cek = mysqli_query($kon, $sql);
        $row = mysqli_fetch_assoc($cek); 


		if($row['Nama_Akun'] === $username && $row['Pass'] === $pass){
			$_SESSION['login'] = true;

		}else{
			$_SESSION['info'] = 'username atau password salah';
		    header("location: ../login.php");
        }

		if(isset($_SESSION['login'])) {
			header("location: ../index.php");
		}else {
			header("location: ../login.php");
			exit();
		}
	}
}




?>