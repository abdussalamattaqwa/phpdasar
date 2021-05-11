console.log('ok');
// ambil elemen2 yang dibutuhkan
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// tombolCari.addEventListener('mouseover', function(){
//   alert('berhasil');
// });
// keyup ketika tangan kita melepas dari keyboard
keyword.addEventListener('keyup', function(){
  // console.log(keyword.value);
  // buat objek ajax
  var xhr = new XMLHttpRequest();
  //cek kesiapan ajax
  xhr.onreadystatechange = function(){
    if( xhr.readyState == 4 && xhr.status == 200){
      // console.log('ajax ok!');
      // console.log(xhr.responseText);
      container.innerHTML = xhr.responseText;
    }
  }
  //eksekusi ajax
  // xhr.open(Objek, sumbernya, mau sinkronus atau asinkronus.. true = asinkronus)
  xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
  xhr.send();
});
