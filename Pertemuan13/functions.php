<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data){
  global $conn;
  $nim = htmlspecialchars($data["nim"]);
  $nama = htmlspecialchars ($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);


    // upload Gambar
    $gambar = upload();
    if (!$gambar){
      return false;
    }

  // queri insert database
  $query = "INSERT INTO mahasiswa
              VALUES
                ('', '$nim', '$nama', '$email', '$jurusan', '$gambar')
            ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


function upload(){
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if($error === 4){
    echo "
      <script>
        alert('pilih gambar terlrbih dahulu');
      </script>
    ";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
    // salam.jpg => ['salam', 'jpg']
  //$ekstensiGambar = end($ekstensiGambar);
    // supaya yang diambil itu adalah paling akhir
  $ekstensiGambar = strtolower (end($ekstensiGambar));
    // untuk memaksa eksistensinya menjadi huruf kecil
  // untuk mengecek apakah eksistensi gambarnya valid supaya user tidak memasukkan sembarang file
  // in_array(jarum, jerami) => menghasilkan booelan
  if ( !in_array($ekstensiGambar, $ekstensiGambarValid)){
    echo "
      <script>
        alert('yang anda upload bukan gambar');
      </script>
    ";
    return false;

  }

  // cek jika ukurannya teralu besar
  // satuannya byte => 1000000 = 1 mb
  if ($ukuranFile > 1000000) {
    echo "
      <script>
        alert('ukurannya terlalu besar');
      </script>
    ";
    return false;
  }

  // lolos pengecekan gambar siap di upload
  //  move_uploaded_file(direktori asal, direktori tujuan )
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

  return $namaFileBaru;

}



function hapus($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function ubah($data){
  global $conn;
  $id = $data["id"];
  $nim = htmlspecialchars($data["nim"]);
  $nama = htmlspecialchars ($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambarLama =  htmlspecialchars($data["gambarLama"]);

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
      $gambar =  $gambarLama;
  } else {
    $gambar =  upload();
  }
  // $gambar =  htmlspecialchars($data["gambar"]);


  // queri insert database
  $query = "UPDATE mahasiswa SET
              nim = '$nim',
              nama = '$nama',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
              WHERE id = $id
            ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE
              nama LIKE '%$keyword%' OR
              nim LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'

            ";
    return query($query);
  }




 ?>
