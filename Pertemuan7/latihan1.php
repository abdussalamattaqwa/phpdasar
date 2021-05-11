<?php
//  Variabel Scope / lingkup Variabel

// GET
// $_GET["Nama"] = "Abdus Salam At-taqwa";
// $_GET["nim"] = "1629041033";
// var_dump($_GET);
// $x=10;
// function tampilx(){
//   global $x;
//   echo $x;
// }
// tampilx();

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
];

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>GET</title>
   </head>
   <body>
     <h1> Daftar Mahasiswa </h1>
     <?php foreach( $mahasiswa as $mhs ) : ?>

     


     <?php endforeach ?>




   </body>
 </html>
