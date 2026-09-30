Modul Praktikum CSS
Pertemuan 4 – Workshop Pemrograman Lanjut
HTML sebagai struktur, CSS sebagai presentasi, PHP sebagai logic, MySQL sebagai
database
Tujuan Pertemuan
 Mahasiswa memahami konsep CSS sebagai pengatur presentasi tampilan web.
 Mahasiswa mampu menggunakan pola selector, property, dan value.
 Mahasiswa mampu menerapkan box model pada form input.
 Mahasiswa mampu membuat interface sederhana yang menghubungkan input dan output.
 Mahasiswa siap masuk ke PHP sebagai logic pada pertemuan berikutnya.
Konsep Inti
CSS tidak hanya dipahami sebagai alat mempercantik halaman. Dalam aplikasi web, CSS berfungsi
mengatur bagaimana struktur HTML ditampilkan kepada pengguna agar mudah dibaca, nyaman digunakan,
dan siap diproses oleh logic aplikasi.
HTML CSS PHP MySQL
Struktur dan interface Presentasi dan layout Logic dan proses Penyimpanan data
Alur besar aplikasi yang sedang dibangun dalam mata kuliah ini: User → HTML/CSS → PHP → MySQL.
Persiapan Praktikum
 Gunakan editor seperti Visual Studio Code, Sublime Text, atau editor lain yang tersedia.
 Buat satu folder kerja: pertemuan-3-css.
 Setiap praktikum memiliki file HTML dan CSS sendiri agar mudah dibandingkan.
 Simpan screenshot hasil sebelum dan sesudah styling sebagai bahan refleksi.
Praktikum 1 – Mengenal CSS: Selector, Property, Value
Tujuan: mahasiswa memahami cara CSS bekerja melalui perubahan tampilan sederhana pada elemen
HTML.
File 1: index.html
<!DOCTYPE html>
<html>
<head>
<title>Praktikum CSS 1</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Workshop Pemrograman Lanjut</h1>
<p>Belajar HTML, CSS, PHP, dan MySQL.</p>
<button>Mulai Belajar</button>
firmanarifin.id | Workshop Pemrograman Lanjut | Pertemuan 4

</body>
</html>
File 2: style.css
body {
font-family: Arial, sans-serif;
}
h1 {
color: blue;
font-size: 32px;
}
p {
font-size: 18px;
}
button {
background-color: blue;
color: white;
padding: 10px 20px;
}
Tugas Praktikum 1
 Ubah warna judul dan amati perubahan yang terjadi.
 Ubah ukuran font pada judul dan paragraf.
 Ubah warna tombol dan warna teks tombol.
 Ubah padding tombol agar tombol terasa lebih nyaman diklik.
 Tuliskan tiga contoh selector, property, dan value yang digunakan.
Praktikum 2 – CSS Form: Input yang Rapi
Tujuan: mahasiswa memahami box model melalui form mahasiswa. Form adalah pintu masuk data,
sehingga harus mudah dibaca dan nyaman digunakan.
File 1: form.html
<!DOCTYPE html>
<html>
<head>
<title>Form Mahasiswa</title>
<link rel="stylesheet" href="form.css">
</head>
<body>
<div class="form-container">
<h2>Data Mahasiswa</h2>
<label>Nama</label>
<input type="text" placeholder="Masukkan nama">
<label>NRP</label>
<input type="text" placeholder="Masukkan NRP">
<label>Program Studi</label>
<select>
<option>Teknik Informatika</option>
<option>Teknik Elektro</option>
firmanarifin.id | Workshop Pemrograman Lanjut | Pertemuan 4

<option>Teknik Telekomunikasi</option>
</select>
<button>Simpan</button>
</div>
</body>
</html>
File 2: form.css
body {
font-family: Arial, sans-serif;
background-color: #eeeeee;
}
.form-container {
width: 400px;
margin: 50px auto;
padding: 20px;
background-color: white;
border: 1px solid #cccccc;
}
label {
display: block;
margin-bottom: 5px;
}
input,
select {
width: 100%;
padding: 10px;
margin-bottom: 15px;
}
button {
width: 100%;
padding: 10px;
background-color: blue;
color: white;
border: none;
}
Konsep Box Model
 Content: isi elemen, misalnya teks di dalam tombol.
 Padding: jarak antara isi elemen dan garis tepi.
 Border: garis batas elemen.
 Margin: jarak elemen dengan elemen lain.
Challenge Praktikum 2
 Tambahkan border-radius pada form, input, select, dan tombol.
 Atur margin-bottom agar jarak antar elemen lebih nyaman.
 Buat tombol utama lebih menonjol.
 Bandingkan tampilan sebelum dan sesudah CSS diperbaiki.
firmanarifin.id | Workshop Pemrograman Lanjut | Pertemuan 4

Praktikum 3 – Mini Interface: Input → Output
Tujuan: mahasiswa memahami bahwa form input akan berkembang menjadi aplikasi. Pada praktikum ini
proses belum dinamis. Output masih dibuat sebagai tabel statis. Pada pertemuan berikutnya, PHP akan
memproses input secara dinamis.
File 1: app.html
<!DOCTYPE html>
<html>
<head>
<title>Aplikasi Mahasiswa</title>
<link rel="stylesheet" href="app.css">
</head>
<body>
<div class="container">
<h1>Data Mahasiswa</h1>
<div class="form-box">
<input type="text" placeholder="Nama mahasiswa">
<input type="text" placeholder="NRP">
<button>Tambah Data</button>
</div>
<h2>Daftar Mahasiswa</h2>
<table>
<tr>
<th>No</th>
<th>NRP</th>
<th>Nama</th>
</tr>
<tr>
<td>1</td>
<td>3126001</td>
<td>Andi</td>
</tr>
<tr>
<td>2</td>
<td>3126002</td>
<td>Siti</td>
</tr>
</table>
</div>
</body>
</html>
File 2: app.css
body {
font-family: Arial, sans-serif;
background-color: #f5f5f5;
}
.container {
width: 700px;
margin: auto;
}
.form-box {
firmanarifin.id | Workshop Pemrograman Lanjut | Pertemuan 4

background-color: white;
padding: 20px;
margin-bottom: 30px;
}
input {
padding: 10px;
margin-right: 10px;
}
button {
padding: 10px 20px;
background-color: blue;
color: white;
border: none;
}
table {
width: 100%;
border-collapse: collapse;
background-color: white;
}
th,
td {
border: 1px solid #cccccc;
padding: 10px;
}
th {
background-color: #eeeeee;
}
Diskusi Penutup Praktikum 3
 Kalau nama dan NRP diketik lalu tombol Tambah Data ditekan, siapa yang akan memprosesnya?
Jawaban: PHP.
 Kalau data ingin tetap tersimpan setelah browser ditutup, disimpan di mana? Jawaban: MySQL.
 Form adalah input, PHP adalah proses, tabel adalah output, dan MySQL adalah tempat data disimpan.
Praktikum 4 –Form Login (modif dari praktikum 3)
Mahasiswa memahami bahwa form login yang sebelumnya sudah dibuat dengan HTML dapat
dikembangkan menjadi antarmuka yang lebih baik menggunakan CSS, dan nantinya akan berkembang
menjadi bagian dari sebuah aplikasi.
Pada praktikum ini, mahasiswa masih fokus pada tampilan dan struktur interface. Proses login ditampilkan
dalam PHP yang dikombinasi dengan CSS juga.
Output yang Dikumpulkan
 Folder pertemuan-4-css berisi empat praktikum.
 File Praktikum 1: index.html dan style.css.
 File Praktikum 2: form.html dan form.css.
 File Praktikum 3: app.html dan app.css.
 File Praktikum 4: formlogin.html, aksilogin.php dan loginapp.css.
 Screenshot hasil sebelum dan sesudah styling.
firmanarifin.id | Workshop Pemrograman Lanjut | Pertemuan 4

  Laporan praktikum dengan ketentuan yang sudah disepakati.
Rubrik Penilaian Singkat
| Aspek          | Indikator                      | Bobot  |
| -------------- | ------------------------------ | ------ |
| Struktur HTML  | Elemen HTML tersusun rapi dan  | 25%    |
sesuai fungsi.
| Penerapan CSS  | Selector, property, value, box model,  | 35%  |
| -------------- | -------------------------------------- | ---- |
dan styling form digunakan dengan
benar.
| Keterbacaan UI  | Form dan tabel mudah dibaca, jarak  | 25%  |
| --------------- | ----------------------------------- | ---- |
elemen nyaman, tombol jelas.
| Akhir Praktikum  |     | 15%  |
| ---------------- | --- | ---- |
Mahasiswa mampu menjelaskan
hubungan HTML, CSS, PHP, dan
MySQL.
Kalimat Kunci
HTML membangun struktur. CSS mengatur presentasi. PHP memberi logika.
MySQL menyimpan data.
firmanarifin.id  |  Workshop Pemrograman Lanjut  |  Pertemuan 4