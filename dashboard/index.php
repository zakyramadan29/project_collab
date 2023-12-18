<?php 

@session_start();
if (isset($_SESSION["login"])) {



?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <style>
    /* Gaya CSS untuk form input */
    body {
      background-color: #f0f0f0;
    }

    h1 {
      text-align: center;
      margin-top: 20px;
      color: #007bff; /* Biru */
    }

    .form-container {
      background-color: #fff; /* Putih */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
      background-color: #007bff !important;
      border-color: #007bff !important;
    }

    .btn-primary:hover {
      background-color: #0056b3 !important;
      border-color: #0056b3 !important;
    }

    /* Gaya CSS untuk tabel */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: #fff; /* Putih */
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 12px;
      text-align: center;
      border: 1px solid #ddd;
    }

    th {
      background-color: #007bff;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    a.edit-link {
      color: #007bff;
      text-decoration: none;
    }

    a.edit-link:hover {
      text-decoration: underline;
    }
    .edit-link,
    .delete-link {
      color: #007bff;
      text-decoration: none;
      margin-right: 10px; /* Tambahkan jarak antara tautan */
      transition: color 0.3s ease; /* Efek hover transisi warna */
    }

    .edit-link:hover,
    .delete-link:hover {
      text-decoration: underline;
      color: #0056b3; /* Warna saat di-hover */
    }
  </style>
</head>
<body>

<h1>INPUT DATA SISWA</h1>

<!-- Form input data siswa -->
<div class="container form-container" style="margin-bottom: 30px;">
  <form class="row g-3" action="vendor/sistem.php" method="post">
  <input type="hidden" name="form" value="form1">
    <div class="col-md-2">
      <label for="inputPassword4" class="form-label">Nama</label>
      <input type="text" class="form-control" id="inputPassword4" name="namadiweb" required>
    </div>
    <div class="col-md-2">
      <label for="inputAddress" class="form-label">Kelas</label>
      <input type="text" class="form-control" id="inputAddress" name="kelasdiweb" required>
    </div>
    <div class="col-md-2">
      <label for="inputAddress" class="form-label">Jurusan</label>
      <input type="text" class="form-control" id="inputAddress" name="jurusandiweb" required>
    </div>
    <div class="col-md-2">
      <label for="inputAddress" class="form-label">Alamat</label>
      <input type="text" class="form-control" id="inputAddress" name="alamatdiweb" required>
    </div>
    <div class="col-md-2">
      <label for="inputAddress" class="form-label">Jenis Kelamin</label>
      <input type="text" class="form-control" id="inputAddress" name="jkdiweb" required>
    </div>
    <div class="col-md-2 mt-5">
      <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
  </form>
</div>
<!-- End form input data siswa -->

<?php
include "vendor/konek.php";

$sql = "SELECT * FROM tb_siswa";
$ambil = mysqli_query($kon, $sql);
$no_urut = 0;
?>

<!-- Tabel daftar siswa -->
<div class="container form-container">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Alamat</th>
        <th scope="col">JK</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($ambil as $key) {
        $no_urut++;
        $id = $key['NO'];
        $nama = $key['NAMA'];
        $kelas = $key['KELAS'];
        $js = $key['JURUSAN'];
        $al = $key['ALAMAT'];
        $jk = $key['JK'];
        ?>
        <tr>
          <th scope="row"><?= $no_urut; ?></th>
          <td><?= $nama; ?></td>
          <td><?= $kelas; ?></td>
          <td><?= $js; ?></td>
          <td><?= $al; ?></td>
          <td><?= $jk; ?></td>
          <td>
            <a href="edit.php?id=<?= $id; ?>" class="edit-link">Edit</a>
            <a href="vendor/delete.php?del=<?= $id; ?>" class="delete-link">Hapus</a>
          </td>
          <td></td>
        </tr>
    </tbody>
    <?php } ?>
  </table>


</div>
</body>
</html>

<?php
}else{
  header("location: login.php");
  exit();
}
?>