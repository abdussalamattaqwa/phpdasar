
<?php

require 'functions.php';
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])){
// var_dump($_POST);
  // ambil data dari tiap elemen dalam form
    // $nim = $_POST["nim"];
    // $nama = $_POST["nama"];
    // $email = $_POST["email"];
    // $jurusan = $_POST["jurusan"];
    // $gambar = $_POST["gambar"];

    // // queri insert database
    // $query = "INSERT INTO mahasiswa
    //             VALUES
    //               ('', '$nim', '$nama', '$email', '$jurusan', '$gambar')
    //           ";
    // mysqli_query($conn, $query);

    // cek apakah data berhasil ditambahkan atau tidak
    // var_dump(mysqli_affected_rows($conn));
    // if(mysqli_affected_rows($conn) > 0 ){
    //   echo "Berhasil";
    // } else {
    //   echo "gagal";
    //   echo "<br>";
    //   echo mysqli_error($conn);
    // }

    if (tambah($_POST) > 0 ){
      echo "
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('data gagal ditambahkan');
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
    <title>Tambah data mahasiswa</title>
  </head>
  <body>
    <h1>Tambah data mahasiswa</h1>

    <form action="" method="post">
      <ul>
        <li>
          <label for="nim">NIM : </label>
          <input type="text" name="nim" id="nim" required>
        </li>
        <li>
          <label for="nama">Nama : </label>
          <input type="text" name="nama" id="nama">
        </li>
        <li>
          <label for="email">Email : </label>
          <input type="text" name="email" id="email">
        </li>
        <li>
          <label for="jurusan">Jurusan</label>
          <input type="text" name="jurusan" id="jurusan">
        </li>
        <li>
          <label for="gambar">Gambar</label>
          <input type="text" name="gambar" id="gambar">
        </li>
        <li>
          <button type="submit" name="submit">Tambah Data!</button>
        </li>



      </ul>

    </form>
  </body>
</html>
