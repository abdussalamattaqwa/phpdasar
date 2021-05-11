
<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari Mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// if (!$result){
//   echo mysqli_error($conn);
// }

// ambil data (fetch) mahasiswa dari objek tersebut
// mysqli_fetch_row() =>  mengembalikan arrau numerik
// $mhs = mysqli_fetch_row($result);
// var_dump($mhs[1]);


// mysqli_fetch_assoc() => mengembaikan array assosiative
// $mhs = mysqli_fetch_assoc($result);
// var_dump($mhs["jurusan"]);


// mysqli_fetch_array() => Mengembalikan keduanya
// $mhs = mysqli_fetch_array($result);
// var_dump($mhs["email"]);
// $mhs = mysqli_fetch_array($result);
// var_dump($mhs[1]);


// mysqli_fetch_object()
// $mhs = mysqli_fetch_object($result);
// var_dump($mhs->nama);


// while ($mhs = mysqli_fetch_assoc($result)) {
//   var_dump($mhs);
// }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Halaman Admin</title>
  </head>
  <body>

    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">

      <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>

      </tr>
      <?php $i=1;
      while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?= $i ?></td>
        <td>
          <a href="">ubah</a> |
          <a href="">hapus</a>
        </td>
        <td> <img src="img/<?= $row["gambar"] ?>" width="50"></td>
        <td><?= $row["nim"] ?></td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["jurusan"] ?></td>

      <?php $i++;
      endwhile; ?>
      </tr>
    </table>

  </body>
</html>
