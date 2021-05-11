<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    // $hari = array("Senin", "selasa", "Rabu", "Kamis");
    // $bulan = ["Januari", "Februari", "Maret"];
    //
    //
    // var_dump($hari);
    // echo "<br>";
    // print_r($bulan);
    //

    $mahasiswa = [
      [
      "nama" => "Abdus Salam At-taqwa",
      "nim" => "1629041033",
      "email" => "salamabdus072@gmail.com",
      "jurusan" => "Pendidikan Teknik Informatika"
      ],
      [
        "nama" => "Ahmad Taufik",
        "nim" => "1629040033",
        "email" => "taufik@gmail.com",
        "jurusan" => "Pendidikan Teknik Informatika"
      ]
    ];?>
  <?php  foreach ($mahasiswa as $mhs) :?>

<ul>
  <li> <?= $mhs["nama"]; ?></li>
  <li> <?= $mhs["nim"]; ?></li>
  <li> <?= $mhs["email"]; ?></li>
  <li> <?= $mhs["jurusan"]; ?></li>
</ul>
<?php endforeach ?>


  </body>
</html>
