
<?php

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
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
        foreach ($mahasiswa as $row) : ?>
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
    endforeach; ?>
      </tr>
    </table>

  </body>
</html>
