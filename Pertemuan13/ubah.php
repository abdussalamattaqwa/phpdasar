
<?php

require 'functions.php';

// ambil data di url
$id = $_GET["id"];
// query data mahasiswa berdasarkan idnya
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id") [0]; // angka 0 supaya indexnya
// seharusnya =>  var_dump($mhs[0]["nim"]);

// koneksi database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])){
// copasji script tambah.php

    if (ubah($_POST) > 0 ){
      echo "
        <script>
          alert('data berhasil diubah!');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('data gagal diubah!');
          documen.location.href = 'index.php';
        </script>
      ";
    }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ubah data mahasiswa</title>
  </head>
  <body>
    <h1>Ubah data mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
          <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">

          <label for="nim">NIM : </label>
          <!-- // required artinya untuk pengaturan formnya harus diisi -->
          <!-- value="salam"  => untuk pengisian form default-->
          <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"] ?>">
        </li>
        <li>
          <label for="nama">Nama : </label>
          <input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ?>">
        </li>
        <li>
          <label for="email">Email : </label>
          <input type="text" name="email" id="email" value="<?= $mhs["email"] ?>">
        </li>
        <li>
          <label for="jurusan">Jurusan</label>
          <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"] ?>">
        </li>
        <li>

          <label for="gambar">Gambar</label> <br>
          <img src="img/<?= $mhs['gambar'];  ?>" alt="" width="50"> <br>
          <input type="file" name="gambar" id="gambar" >
        </li>
        <li>
          <button type="submit" name="submit">ubah Data!</button>
        </li>
      </ul>

    </form>
  </body>
</html>
