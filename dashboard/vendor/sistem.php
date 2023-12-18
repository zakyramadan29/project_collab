<?php

include "konek.php";

if (isset($_POST["form"])) {
    $form = $_POST["form"];
    
    if ($form === "form1") {
        include("index.php");

$nama = $_POST['namadiweb'];
$kelas = $_POST['kelasdiweb'];
$jurusan = $_POST['jurusandiweb'];
$alamat = $_POST['alamatdiweb'];
$jk = $_POST['jkdiweb'];


$sql = "insert into tb_siswa(NAMA,KELAS,JURUSAN,ALAMAT,JK) VALUES ('$nama','$kelas','$jurusan','$alamat','$jk')";
mysqli_query($kon, $sql);

header("location: ../index.php");
// echo $nama.",".$kelas.",".$alamat.",".$jurusan.",".$jk;

}elseif ($form === "form2") {
    include("edit.php");

$id = $_GET['id'];
$enama = $_POST['enamadiweb'];
$ekelas = $_POST['ekelasdiweb'];
$ejurusan = $_POST['ejurusandiweb'];
$ealamat = $_POST['ealamatdiweb'];
$ejk = $_POST['ejkdiweb'];

$edit ="UPDATE tb_siswa SET NAMA='".$enama."', KELAS='".$ekelas."', JURUSAN='".$ejurusan."', ALAMAT='".$ealamat."', JK='".$ejk."' WHERE No =".$id;

mysqli_query($kon, $edit);
header ("location: ../index.php");

} else {
    echo "tidak ditemukan";
}

} else {
echo "tentukan dengan parameter 'form'.";
}

// function hapus($id) {
//     global $conn;
//     mysqli_query($conn, "DELETE FROM tb_siswa WHERE id = $id");

//     return mysqli_affected_rows($conn);

// }
?>