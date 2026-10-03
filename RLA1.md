LAPORAN PRAKTIKUM I

RANGKAIAN OP-AMP COMPARATOR

Moch. Zidhan Reihan Cholis  - 2125600101

Mata Kuliah

: Praktikum. Rangkaian Linear Aktif

Dosen Pengampu

: Mohd. Syafrudin

Program Studi

: D4 Teknik Elektronika

Semester

: 3

Politeknik Elektronika Negeri Surabaya (PENS)

Tahun 2026

Praktikum Rangkaian Linear Aktif

PRAKTIKUM  1

Rangkaian Comparator Menggunakan Op-Amp

I.  Tujuan

1.  Menganalisis prinsip kerja Op-Amp sebagai komparator tegangan pada

konfigurasi open loop.

2.  Mengamati perbedaan karakteristik keluaran komparator pada konfigurasi non-

inverting dan inverting.

3.  Menganalisis pengaruh nilai tegangan referensi terhadap output komparator,

dengan membandingkan 𝑉𝑟𝑒𝑓 =  0𝑉 dan 𝑉𝑟𝑒𝑓 = 5V.

4.  Membandingkan bentuk gelombang keluaran terhadap tegangan AC pada

keempat konfigurasi rangkaian komparator yang disimulasikan.

II.  Tinjauan Teori

Operational Amplifier (Op-Amp) yang dioperasikan secara open loop

memiliki penguatan tegangan 𝐴𝑜𝑙 yang bernilai sangat besar, sekitar 105−106.
Karena penguatan yang sangat besar, output Op-Amp sangat sensitif terhadap

selisih tegangan sekecil apa pun antara input non-inverting (𝑉+) dan input

inverting (𝑉−).

Persamaan tegangan output :

𝑉𝑜𝑢𝑡 = 𝐴𝑜𝑙 ⋅ (𝑉+   −   𝑉− )

Karena itu, tegangan output Op-Amp perlu dibatasi oleh voltage power

supply.

1

Praktikum Rangkaian Linear Aktif

III.  Prosedur Praktikum

Gambar 1. Rangkaian Open Loop Comparator

III.1.  Komparator Inverting dengan Tegangan Referensi Nol

1.  Buka software simulasi LTspice, kemudian buat schematic baru.

2.  Place simbol Op-Amp sebagai komparator, lalu beri sumber tegangan V1 dengan

sinyal sinus (f = 1KHz dan Amplitudo = 10V) pada jalur inverting.

3.  Hubungkan jalur non-inverting (𝑉+) dengan V2 berupa tegangan DC 0V sebagai

tegangan referensi.

4.  Berikan tegangan pembatas Op-Amp di +15V dan −15V.

5.  Atur stop time 5m untuk analisis selama 5 milidetik.

6.  Jalankan  simulasi  dengan  menekan  simbol  run,  lalu  amati  bentuk  gelombang

V(inv), V(non−inv), dan V(output) pada grafik.

Gambar 1.1. Rangkaian Komparator Inverting dengan Tegangan Referensi 0V

2

Praktikum Rangkaian Linear Aktif

III.2.  Komparator Inverting dengan Tegangan Referensi 5V

1.  Kembali ke rangkaian inverting seperti pada sub-bab 3.1, namun ubah tegangan

referensi V2 di jalur inverting (𝑉+) menjadi DC 5V.

2.  Atur stop time 5m untuk analisis transien selama 5 milidetik.

3.  Jalankan  simulasi  dengan  menekan  simbol  run,  lalu  amati  bentuk  gelombang

V(inv), V(non−inv), dan V(output) pada grafik.

Gambar 1.2. Rangkaian Komparator Inverting dengan Tegangan Referensi 5V

III.3.  Komparator Non-Inverting dengan Tegangan Referensi Nol

1.  Buat rangkaian seperti pada sub-bab 3.1 sebagai dasar, lalu ubah posisi sumber

tegangan sinus V1 (f = 1KHz dan Amplitudo = 10V) ke jalur Non-Inverting.

2.  Ubah sumber tegangan DC V2 ke jalur inverting (𝑉−) lalu atur nilai DC 0V.

3.  Atur stop time 5m untuk analisis transien selama 5 milidetik.

4.  Jalankan  simulasi  dengan  menekan  simbol  run,  lalu  amati  bentuk  gelombang

V(inv), V(non−inv), dan V(output) pada grafik.

Gambar 1.3. Rangkaian Komparator Inverting dengan Tegangan Referensi Nol

3

Praktikum Rangkaian Linear Aktif

III.4.  Komparator Non-Inverting dengan Tegangan Referensi 5V

1.  Kembali  ke  rangkaian  non-inverting  seperti  pada  sub-bab  3.3,  namun  ubah

tegangan referensi V2 di jalur inverting (𝑉−) menjadi DC 5V.

2.  Atur stop time 5m untuk analisis transien selama 5 milidetik.

3.  Jalankan  simulasi  dengan  menekan  simbol  run,  lalu  amati  bentuk  gelombang

V(inv), V(non−inv), dan V(output) pada grafik.

Gambar 1.4. Rangkaian Komparator Inverting dengan Tegangan Referensi 5V

4

Praktikum Rangkaian Linear Aktif

IV.  Analisa

IV.1.  Analisis Komparator Inverting dengan Tegangan Referensi 0V

Pada  konfigurasi  ini,  input  inverting  (V⁻)  diberi  sinyal  sinus  V1  dengan

frekuensi  1  kHz  dan  amplitudo  10V,  sedangkan  input  non-inverting  (V⁺)

dihubungkan ke V2 = 0 V.

𝑉𝑜𝑢𝑡 = 𝐴𝑜𝑙 ⋅ (𝑉+ − 𝑉−) = 𝐴𝑜𝑙 ⋅ (𝑉2 − 𝑉1)

𝑉𝑜𝑢𝑡 = 𝐴𝑜𝑙 ⋅ (0 − 10) = 𝐴𝑜𝑙 ⋅   (−10)

Saat  V1  bernilai  positif,  selisih  input  menjadi  negatif  sehingga  output  berada

pada level LOW dan dibatasi oleh tegangan supply, yaitu sekitar −15V. Sebaliknya,

saat V1 bernilai negatif, output menjadi HIGH dan di batasi supply, sekitar +15V.

Output  komparator  berbanding  terbalik  terhadap  input.  Karena  tegangan

referensi  V2  =  0V  berada  tepat  di  tengah  sinyal  sinus,  pulse  HIGH  dan  LOW

berdurasi  sama.  Dengan  periode  sinyal  1  ms,  masing-masing  0,5  ms  atau  bisa

dibilang duty cycle sebesar 50%.

5

Praktikum Rangkaian Linear Aktif

IV.2. Analisis Komparator Inverting dengan Tegangan Referensi 5V

Pada konfigurasi  ini, input  inverting (V⁻)  tetap diberi  sinyal  sinus V1 dengan

frekuensi  1  kHz  dan  amplitudo  10V,  sedangkan  input  non-inverting  (V⁺)

dihubungkan ke V2 = 5V.

𝑉𝑜𝑢𝑡 = 𝐴𝑜𝑙 ⋅ (𝑉+ − 𝑉−) = 𝐴𝑜𝑙 ⋅ (𝑉2 − 𝑉1)

𝑉𝑜𝑢𝑡 = 𝐴𝑜𝑙 ⋅ (5 − 10) = 𝐴𝑜𝑙 ⋅ (−5)

Saat  V1  lebih  besar  dari  5  V,  selisih  input  menjadi  negatif  sehingga  output

berada  pada  level  LOW  dan  dibatasi  oleh  tegangan  supply,  yaitu  sekitar  −15V.

Sebaliknya, saat V1 lebih kecil dari 5V, output menjadi HIGH dan dibatasi supply,

sekitar +15V.

Output  komparator  tetap  berbanding  terbalik  terhadap  input.  Namun,  karena

tegangan referensi  dinaikkan menjadi  5V, titik perubahan output bergeser dari 0V

menjadi 5V. Hal ini menyebabkan pulse HIGH dan LOW menjadi tidak sama, pulse

HIGH lebih lama, sehingga duty cycle output berubah.

6

Praktikum Rangkaian Linear Aktif

IV.3. Analisis Komparator Non-Inverting dengan Tegangan Referensi 0V

Pada  konfigurasi  ini  fitukar,  input  non-inverting  (V⁺)  diberi  sinyal  sinus  V1

dengan  frekuensi  1  kHz  dan  amplitudo  10V,  sedangkan  input  inverting  (V⁻)

dihubungkan ke V2 = 0V.

𝑉𝑜𝑢𝑡 = 𝐴𝑜𝑙 ⋅ (𝑉+ − 𝑉−) = 𝐴𝑜𝑙 ⋅ (𝑉2 − 𝑉1)

𝑉𝑜𝑢𝑡 = 𝐴𝑜𝑙 ⋅ (10 − 0) = 𝐴𝑜𝑙 ⋅  10

Saat  V1  bernilai  positif,  selisih  input  menjadi  positif  sehingga  output  berada

pada level HIGH dan dibatasi oleh tegangan supply, yaitu sekitar +15V. Sebaliknya,

saat V1 bernilai negatif, output menjadi LOW dan dibatasi supply, sekitar −15V.

Sama  halnya  dengan  konfigurasi  pertama,  rangkaian  ini  memiliki  duty  cycle

50%. Namun yamg membedakan yaitu output komparator berbanding lurus terhadap

input.

7

Praktikum Rangkaian Linear Aktif

IV.4. Analisis Komparator Non-Inverting dengan Tegangan Referensi 0V

Pada  konfigurasi  ini,  input  non-inverting  (V⁺)  diberi  sinyal  sinus  V1  dengan

frekuensi 1 kHz dan amplitudo 10V, sedangkan input inverting (V⁻) dihubungkan ke

V2 = 5V.

𝑉𝑜𝑢𝑡 = 𝐴𝑜𝑙 ⋅ (𝑉+ − 𝑉−) = 𝐴𝑜𝑙 ⋅ (𝑉2 − 𝑉1)

𝑉𝑜𝑢𝑡 = 𝐴𝑜𝑙 ⋅ (10 − 5) = 𝐴𝑜𝑙 ⋅  5

Saat V1 lebih besar dari 5V, selisih input menjadi positif sehingga output berada

pada level HIGH dan dibatasi oleh tegangan supply, yaitu sekitar +15V. Sebaliknya,

saat V1 lebih kecil dari 5V, output menjadi LOW dan dibatasi supply, sekitar −15V.

Output  komparator  tetap  berbanding  lurus  terhadap  input.  Namun,  karena

tegangan referensi  dinaikkan menjadi  5V, titik perubahan output bergeser dari 0V

menjadi  5V.  Hal  ini  menyebabkan  durasi  pulse  HIGH  lebih  pendek  dibandingkan

LOW, sehingga duty cycle berubah.

8

Praktikum Rangkaian Linear Aktif

V. Kesimpulan

1.  Rangkaian  comparator  menghasilkan  output  HIGH  atau  LOW  berdasarkan

perbandingan antara tegangan input dan tegangan referensi (Vref).

2.  Pada konfigurasi inverting, output berbanding terbalik terhadap input, sedangkan

pada konfigurasi non-inverting, output berbanding lurus terhadap input.

3.  Saat  Vref  =  0V,  pulse  HIGH  dan  LOW  memiliki  durasi  yang  sama  sehingga

menghasilkan duty cycle sekitar 50% pada kedua konfigurasi.

4.  Saat Vref  5V, titik perubahan output bergeser ke 5V sehingga durasi pulse HIGH

dan LOW menjadi berbeda. Pada konfigurasi inverting, pulse HIGH lebih lama,

sedangkan pada konfigurasi non-inverting, pulse LOW lebih lama.

5.  Perubahan konfigurasi input dan nilai Vref memengaruhi bentuk serta durasi pulse

output,  sehingga  comparator  dapat  digunakan  untuk  mengubah  sinyal  sinus

menjadi sinyal kotak dengan duty cycle tertentu.

9

