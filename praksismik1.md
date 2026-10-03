LAPORAN PRAKTIKUM I

SIMULASI Z80 SIMULATOR IDE

Moch. Zidhan Reihan Cholis  - 2125600101

Mata Kuliah

: Praktikum. Sistem Mikroprosesor

Dosen Pengampu

: Paulus Sesetyo Wardana

Program Studi

: D4 Teknik Elektronika

Semester

: 3

TEKNIK ELEKTRONIKA

DEPARTEMEN TEKNIK ELEKTRO

POLITEKNIK ELEKTRONIKA NEGERI SURABAYA

Tahun 2026

Praktikum. Sistem Mikroprosesor

PRAKTIKUM  1

Simulasi Z80 Simulator IDE

I.  PERCOBAAN

I.1.  Percobaan 1

Percobaan

ini  dilakukan  untuk  memahami  cara  memasukkan  data

heksadesimal ke dalam register 8-bit pada mikroprosesor Z80 menggunakan instruksi

LD.

Kode Assembly :

ORG 0000H

LD A, 35H

LD B, 09H

LD C, A2H

HALT

I.2.  Percobaan 2

Percobaan ini bertujuan memahami penggunaan register HL sebagai penunjuk

alamat  memori,  serta  operasi  komplemen  data  menggunakan  instruksi  CPL  dan

penyimpanan hasil ke memori.

Kode Assembly :

LD HL, 40H

LD A, 2BH

LD (HL), A

CPL

INC HL

LD (HL), A

HALT

1

Praktikum. Sistem Mikroprosesor

I.3.  Percobaan 3

Percobaan ini dilakukan untuk memahami proses penjumlahan dua bilangan 8-

bit  menggunakan  register  A  dan  data  yang  tersimpan  di  memori,  serta  menyimpan

hasilnya ke alamat memori yang berbeda.

Kode Assembly :

LD HL, 40H

LD A, 15H

LD (HL), A

INC HL

LD A, 2FH

LD (HL), A

DEC HL

ADD A, (HL)

INC HL

INC HL

LD (HL), A

HALT

I.4.  Percobaan 4

Percobaan  ini  bertujuan  memahami  penjumlahan  dua  bilangan  16-bit

menggunakan  mikroprosesor  Z80.  Bilangan  2F3BH  dan  E74FH  dijumlahkan,

kemudian  hasilnya  disimpan  ke  memori  dalam  tiga  byte  karena  hasil  penjumlahan

melebihi kapasitas 16-bit.

Kode Assembly :

ORG 0000H

LD HL, 2F3BH

LD DE, E74FH

ADD HL, DE

LD (44H), HL

LD A, 00H

ADC A, 00H

LD (46H), A

HALTLD (HL), A

HALT

2

Praktikum. Sistem Mikroprosesor

II.  ANALISA

II.1.  Percobaan 1

1.  ORG 0000H menentukan alamat awal program pada 0000H.

2.  LD A, 35H, LD B, 09H, dan LD C, A2H digunakan untuk memasukkan data

ke register A, B, dan C secara berurutan.

3.  HALT menghentikan eksekusi program setelah seluruh instruksi dijalankan.

Hasilnya,  register  A  berisi  35H,  register  B  berisi  09H,  dan  register  C

berisi A2H. Percobaan ini menunjukkan bahwa instruksi LD dapat digunakan

untuk mengisi register dengan data secara langsung.

3

Praktikum. Sistem Mikroprosesor

II.2.

Percobaan 2

1.  LD  HL,  40H  mengisi  register  HL  dengan  alamat  40H  sebagai  penunjuk

memori.

2.  LD A, 2BH memasukkan data  2BH ke register A, kemudian LD (HL), A

menyimpannya ke alamat 40H.

3.  CPL membalik seluruh bit pada register A. Data 2BH berubah menjadi D4H.

4.  INC HL menaikkan alamat HL menjadi 41H, lalu LD (HL), A menyimpan

hasil komplemen ke alamat tersebut.

5.  HALT menghentikan program.

Hasil akhirnya, memori alamat 40H berisi 2BH, sedangkan alamat 41H

berisi  D4H.  Percobaan  ini  menunjukkan  bahwa  data  dapat  dimanipulasi  di

register dan hasilnya disimpan pada alamat memori yang berbeda.

4

Praktikum. Sistem Mikroprosesor

II.3.

Percobaan 3

1.  LD HL, 40H menentukan alamat awal penyimpanan data.

2.  LD A, 15H dan LD (HL), A menyimpan data 15H ke alamat 40H.

3.  INC HL memindahkan alamat ke 41H. Data 2FH kemudian dimasukkan ke

register A dan disimpan pada alamat tersebut.

4.  DEC  HL  mengembalikan  HL  ke  alamat  40H.  Instruksi  ADD  A,  (HL)

menjumlahkan isi register A (2FH) dengan data pada alamat 40H (15H).

5.  Hasil penjumlahan, yaitu 44H, tersimpan di register A. Dua instruksi INC

HL  memindahkan  alamat  ke  42H,  kemudian  LD  (HL),  A  menyimpan

hasilnya di alamat tersebut.

6.  HALT menghentikan program.

Hasil  akhirnya,  alamat  40H  berisi  15H,  alamat  41H  berisi  2FH,  dan

alamat 42H berisi hasil penjumlahan 44H.

5

Praktikum. Sistem Mikroprosesor

II.4.

Percobaan 4

1.  ORG 0000H menentukan alamat awal program. Register HL diisi 2F3BH,

sedangkan DE diisi E74FH.

2.  ADD  HL,  DE  menjumlahkan  kedua  bilangan  tersebut.  Hasil  lengkapnya

adalah  1168AH,  tetapi  register  HL  hanya  menampung  16-bit  sehingga

menyimpan 168AH, dengan carry sebesar 1

3.  LD  (44H),  HL  menyimpan  hasil  16-bit  ke  memori.  Byte  rendah  8AH

disimpan di alamat 44H, sedangkan byte tinggi 16H disimpan di alamat 45H.

4.  LD  A,  00H  mengisi  register  A  dengan  nol.  Selanjutnya,  ADC  A,  00H

menambahkan carry dari operasi sebelumnya sehingga register A berisi 01H.

5.  LD  (46H),  A  menyimpan  carry  sebagai  byte  tertinggi  hasil  penjumlahan,

kemudian HALT menghentikan program.

Hasil akhirnya adalah 44H = 8AH, 45H = 16H, dan 46H = 01H. Dengan

demikian,  hasil  lengkap  penjumlahan  yang  tersimpan  di  memori  adalah

1168AH.

6

Praktikum. Sistem Mikroprosesor

III.  Kesimpulan

1.  Percobaan  pertama  menunjukkan  bahwa  instruksi  LD  dapat  digunakan  untuk

memasukkan data ke dalam register 8-bit pada mikroprosesor Z80.

2.  Percobaan kedua menunjukkan penggunaan register HL untuk menunjuk alamat

memori serta instruksi CPL untuk membalik bit data sebelum disimpan ke alamat

memori berikutnya.

3.  Percobaan  ketiga  menunjukkan  proses  penjumlahan  dua  bilangan  8-bit

menggunakan register A dan data dari memori, kemudian menyimpan hasilnya

pada alamat memori yang ditentukan.

4.  Percobaan  keempat  menunjukkan  penjumlahan  dua  bilangan  16-bit  dengan

memperhatikan carry yang dihasilkan. Karena hasilnya melebihi kapasitas 16-bit,

hasil lengkap disimpan dalam tiga byte di memori.

7

