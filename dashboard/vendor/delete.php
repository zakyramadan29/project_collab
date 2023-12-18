<?php
include "konek.php";

$del = $_GET['del'];

$hapus = "DELETE FROM tb_siswa WHERE No=".$del;

mysqli_query($kon, $hapus);
header ("location:../index.php");


?>