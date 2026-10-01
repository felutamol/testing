MODUL PRAKTIKUM #7
Interpolasi dan Aproksimasi untuk Kalibrasi Sensor
Linear Interpolation • Lagrange Interpolation • Cubic Spline • Polynomial Fitting
Google Colab + NumPy/SciPy
1. Tujuan Praktikum
• Membedakan interpolasi dan aproksimasi.
• Mengimplementasikan interpolasi linier secara manual dan dengan NumPy.
• Mengimplementasikan interpolasi Lagrange untuk membentuk satu polinom
global dari titik kalibrasi.
• Menerapkan cubic spline pada titik kalibrasi.
• Membangun polynomial fitting beberapa derajat.
• Mengevaluasi model menggunakan residual dan RMSE.
• Merancang lookup table sederhana untuk implementasi embedded.
2. Dasar Teori
2.1 Interpolasi Linier
y(x) = y0 + [(y1-y0)/(x1-x0)](x-x0)
Interpolasi linier menggunakan dua titik yang mengapit nilai x yang akan
diperkirakan. Metode ini ringan dan banyak digunakan pada lookup table embedded.
2.2 Interpolasi Lagrange
Untuk n+1 titik (x₀,y₀), (x₁,y₁), ..., (xₙ,yₙ), interpolasi Lagrange membentuk satu
polinom global:
Pₙ(x) = Σᵢ₌₀ⁿ yᵢ Lᵢ(x)
Lᵢ(x) = ∏ⱼ₌₀,ⱼ≠ᵢⁿ (x-xⱼ)/(xᵢ-xⱼ)
Setiap basis Lᵢ(x) bernilai 1 pada xᵢ dan 0 pada titik data lainnya. Karena itu Pₙ(x)
melewati seluruh titik kalibrasi. Berbeda dengan piecewise linear yang hanya
memakai dua titik lokal pada satu interval, Lagrange memakai semua titik sekaligus
untuk membentuk satu polinom global.
2.3 Polynomial Interpolation dan Fitting
2.4 Cubic Spline
Si(x)=ai+bi(x-xi)+ci(x-xi)²+di(x-xi)³

Cubic spline menggunakan polynomial kubik pada setiap interval dan menjaga
kontinuitas fungsi serta turunannya pada knot.
2.5 Interpolation vs Extrapolation
Interpolation dilakukan di dalam rentang kalibrasi. Extrapolation dilakukan di luar
rentang dan harus digunakan dengan hati-hati karena perilaku model di luar data
tidak terjamin.
3. Dataset Praktikum
No.  Besaran Fisik x  Output Sensor y (V)
| 1   | 0   | 0.12  |
| --- | --- | ----- |
| 2   | 10  | 0.43  |
| 3   | 20  | 0.82  |
| 4   | 30  | 1.32  |
| 5   | 40  | 1.93  |
| 6   | 50  | 2.66  |
| 7   | 60  | 3.51  |
| 8   | 70  | 4.48  |
4. Persiapan Google Colab
import numpy as np
import matplotlib.pyplot as plt
from scipy.interpolate import CubicSpline
5. Percobaan
Percobaan 1 Visualisasi Data Kalibrasi
x=np.array([0,10,20,30,40,50,60,70.])
y=np.array([.12,.43,.82,1.32,1.93,2.66,3.51,4.48])

plt.scatter(x,y)
plt.xlabel("Besaran fisik x")
plt.ylabel("Output sensor y (V)")
plt.grid(); plt.show()
Analisis:
•  Apakah hubungan sensor tampak linier?
•  Pada bagian mana curvature mulai terlihat?
Percobaan 2 Interpolasi Linier Manual
def linear_interp(x0,y0,x1,y1,xq):
    return y0 + (y1-y0)/(x1-x0)*(xq-x0)

y35=linear_interp(30,1.32,40,1.93,35)
print("y(35) =",y35)

Analisis:
• Hitung ulang secara manual.
• Mengapa titik 30 dan 40 yang digunakan untuk x=35?
Percobaan 3 np.interp
for xq in [5,15,25,35,45,55,65]:
print(xq, np.interp(xq,x,y))
Analisis:
• Bandingkan dengan perhitungan manual untuk x=35.
• Apa keuntungan lookup table + interpolasi untuk embedded?
Percobaan 4 Interpolasi Lagrange
def lagrange_interp(x_data, y_data, xq):
n = len(x_data)
yq = 0.0
for i in range(n):
Li = 1.0
for j in range(n):
if i != j:
Li *= (xq - x_data[j]) / (x_data[i] - x_data[j])
yq += y_data[i] * Li
return yq
# contoh 3 titik pertama
x3 = x[:3]
y3 = y[:3]
print("Lagrange 3 titik, y(15) =", lagrange_interp(x3,y3,15))
# gunakan seluruh titik kalibrasi
print("Lagrange semua titik, y(35) =", lagrange_interp(x,y,35))
Analisis:
• Jelaskan mengapa setiap basis Lᵢ(x) bernilai 1 pada xᵢ dan 0 pada titik data
lainnya.
• Bandingkan konsep Lagrange dengan interpolasi linier piecewise: titik mana saja
yang digunakan untuk menghitung y(35)?
• Apa konsekuensi penggunaan satu polinom global jika jumlah titik kalibrasi
semakin banyak?
Percobaan 5 Polynomial Fitting Degree 1 dan 2
p1=np.poly1d(np.polyfit(x,y,1))
p2=np.poly1d(np.polyfit(x,y,2))

xd=np.linspace(0,70,300)
plt.scatter(x,y,label="data")
plt.plot(xd,p1(xd),label="degree 1")
plt.plot(xd,p2(xd),label="degree 2")
plt.grid(); plt.legend(); plt.show()
Analisis:
• Model mana yang lebih sesuai secara visual?
• Mengapa degree-1 mungkin underfit?
Percobaan 6 Bandingkan RMSE Polynomial
for deg in [1,2,3,5,7]:
p=np.poly1d(np.polyfit(x,y,deg))
rmse=np.sqrt(np.mean((y-p(x))**2))
print("degree",deg,"RMSE =",rmse)
Analisis:
• Mengapa RMSE training cenderung turun saat degree bertambah?
• Apakah RMSE paling kecil selalu berarti model terbaik untuk sensor?
Percobaan 7 Cubic Spline
cs=CubicSpline(x,y,bc_type="natural")
xd=np.linspace(0,70,300)
plt.scatter(x,y,label="data")
plt.plot(xd,cs(xd),label="natural cubic spline")
plt.grid(); plt.legend(); plt.show()
print("spline y(35) =",cs(35))
Analisis:
• Bandingkan y(35) dari spline dan linear interpolation.
• Mengapa spline lebih halus?
Percobaan 8 Bandingkan Empat Metode
p2=np.poly1d(np.polyfit(x,y,2))
xq=np.array([5,15,25,35,45,55,65.])
print("x linear lagrange spline poly2")
for z in xq:
yl = np.interp(z,x,y)
ylag = lagrange_interp(x,y,z)
ys = cs(z)
yp = p2(z)
print(z, yl, ylag, ys, yp)

Analisis:
• Apakah keempat metode menghasilkan nilai identik?
• Metode mana yang melewati titik kalibrasi secara persis? Bandingkan Lagrange,
cubic spline, dan polynomial fitting.
Percobaan 9 Simulasi Data Noisy
rng=np.random.default_rng(7)
y_noisy=y+rng.normal(0,0.10,size=len(y))
p2n=np.poly1d(np.polyfit(x,y_noisy,2))
csn=CubicSpline(x,y_noisy,bc_type="natural")
plt.scatter(x,y_noisy,label="noisy calibration")
plt.plot(xd,p2n(xd),label="poly fit degree 2")
plt.plot(xd,csn(xd),label="spline")
plt.grid(); plt.legend(); plt.show()
Analisis:
• Mengapa spline mengikuti noise pada titik kalibrasi?
• Mengapa fitting dapat lebih cocok jika tujuan kita mencari trend?
Percobaan 10 Extrapolation
for z in [-10,80,100]:
print("x =",z,"poly2 =",p2(z),"spline =",cs(z))
Analisis:
• Mengapa hasil di luar 0-70 harus dicurigai?
• Apakah model mengetahui batas fisik sensor?
Percobaan 11 Lookup Table Function
import numpy as np
import pandas as pd
def sensor_lookup(xq, x_table, y_table):
if xq < x_table[0] or xq > x_table[-1]:
raise ValueError("Di luar rentang kalibrasi")
return np.interp(xq, x_table, y_table)
# Nilai yang akan diestimasi
x_query = [12, 27, 46, 63]
hasil = []
for xq in x_query:
yq = sensor_lookup(xq, x, y)
hasil.append([xq, yq])
# Tampilkan sebagai tabel
tabel = pd.DataFrame(
hasil,
columns=["Besaran Fisik (x)", "Output Sensor (V)"]
)
print(tabel.round(3).to_string(index=False))

Analisis:
• Mengapa pengecekan rentang ditambahkan?
• Bagaimana fungsi ini dapat diterjemahkan ke C/C++ pada ESP32?
6. Engineering Challenge
Anda mempunyai 12 titik kalibrasi sensor nonlinier dan akan
menanamkan fungsi konversinya pada ESP32. Bandingkan
polynomial degree-2, interpolasi Lagrange, cubic spline, dan lookup
table + linear interpolation.
1. Bandingkan akurasi pada data validasi.
2. Bandingkan jumlah parameter/data yang perlu disimpan.
3. Bandingkan kompleksitas operasi saat inference.
4. Pertimbangkan risiko extrapolation.
5. Pilih satu metode dan berikan alasan engineering.
7. Tugas Pengembangan
Gunakan data kalibrasi sensor nyata atau data eksperimen minimal 10 titik.
Terapkan sekurang-kurangnya dua metode dari linear interpolation, Lagrange
interpolation, cubic spline, dan polynomial fitting.
1. Plot data eksperimen.
2. Jelaskan karakteristik hubungan input-output.
3. Terapkan dua metode numerik.
4. Bandingkan hasil pada beberapa titik di antara data.
5. Evaluasi error jika ground truth tersedia.
6. Jelaskan metode yang paling layak diimplementasikan pada perangkat
embedded.
8. Pertanyaan Evaluasi
1. Apa perbedaan interpolation dan approximation?
2. Mengapa linear interpolation cocok untuk lookup table?
3. Apa perbedaan utama interpolasi Lagrange dan interpolasi linier piecewise?
4. Apa kelebihan cubic spline dibanding polynomial global orde tinggi?
5. Mengapa polynomial fitting tidak harus melewati semua data?
6. Apa risiko polynomial degree terlalu tinggi?
7. Mengapa extrapolation lebih berisiko daripada interpolation?

9. Referensi
• Chapra, S. C., & Canale, R. P. (2021). Numerical Methods for Engineers (8th ed.).
McGraw Hill.
• Burden, R. L., Faires, J. D., & Burden, A. M. (2016). Numerical Analysis (10th
ed.). Cengage Learning.
• NumPy Developers. NumPy Documentation: numpy.interp dan polynomial fitting.
• SciPy Developers. SciPy Documentation: scipy.interpolate.CubicSpline.
• Fraden, J. (2016). Handbook of Modern Sensors: Physics, Designs, and
Applications (5th ed.). Springer.