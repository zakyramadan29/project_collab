<?php
include ('vendor/konek.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <style>
    /* Gaya CSS tambahan untuk form */
    body {
      background-color: #f0f0f0;
    }

    h1 {
      text-align: center;
      margin-top: 20px;
      color: #007bff; /* Biru */
    }

    form {
      background-color: #fff; /* Putih */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    /* Gaya CSS untuk tombol "Simpan" */
    .btn-primary {
      background-color: #007bff !important;
      border-color: #007bff !important;
    }

    .btn-primary:hover {
      background-color: #0056b3 !important;
      border-color: #0056b3 !important;
    }
  </style>
</head>
<body>

<h1 style="margin-bottom: 30px;">Edit Data Siswa</h1>

<?php
$data_siswa = mysqli_query($kon,"SELECT * FROM tb_siswa where NO =".$_GET['id']);
foreach ($data_siswa as $key) {
  $id = $key['NO'];
  $nama = $key['NAMA'];
  $kelas = $key['KELAS'];
  $js = $key['JURUSAN'];
  $al = $key['ALAMAT'];
  $jk = $key['JK'];
}
?>

<!-- Form edit data siswa -->
<form class="row g-3 mx-3" action="vendor/sistem.php?id=<?=$id;?>" method="post">
<input type="hidden" name="form" value="form2">
  <div class="col-md-2">
    <label for="inputPassword4" class="form-label">Nama</label>
    <input type="text" value="<?= $nama; ?>" class="form-control" id="inputPassword4" name="enamadiweb">
  </div>
  <div class="col-md-2">
    <label for="inputAddress" class="form-label">Kelas</label>
    <input type="text" value="<?= $kelas; ?>" class="form-control" id="inputAddress" name="ekelasdiweb">
  </div>
  <div class="col-md-2">
    <label for="inputAddress" class="form-label">Jurusan</label>
    <input type="text" value="<?= $js; ?>" class="form-control" id="inputAddress" name="ejurusandiweb">
  </div>
  <div class="col-md-2">
    <label for="inputAddress" class="form-label">Alamat</label>
    <input type="text" value="<?= $al; ?>" class="form-control" id="inputAddress" name="ealamatdiweb">
  </div>
  <div class="col-md-2">
    <label for="inputAddress" class="form-label">Jenis Kelamin</label>
    <input type="text" value="<?= $jk; ?>" class="form-control" id="inputAddress" name="ejkdiweb">
  </div>
  <div class="col-12 mb-5">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>
<!-- End form edit data siswa -->

</body>
</html>
