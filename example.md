MODUL PRAKTIKUM #7
Optimisasi Numerik dengan Gradient Descent
Fungsi Objektif • Learning Rate • Convergence • Kalibrasi Sensor • Machine Learning Sederhana
Google Colab + NumPy
1. Tujuan Praktikum
• Memahami cara kerja Gradient Descent sebagai metode optimisasi iteratif.
• Menganalisis pengaruh learning rate terhadap kecepatan dan kestabilan
konvergensi.
• Menggunakan Gradient Descent untuk memperoleh persamaan kalibrasi sensor
TDS.
• Menerapkan Gradient Descent pada model regresi linier sederhana sebagai contoh
machine learning di bidang elektronika.
• Mengevaluasi model menggunakan MSE/RMSE dan kurva convergence.
2. Dasar Teori
2.1 Optimisasi dan Gradient Descent
Optimisasi mencari parameter yang membuat fungsi objektif atau loss sekecil
mungkin. Pada Gradient Descent, parameter diperbarui sedikit demi sedikit ke arah
yang menurunkan nilai loss.
?(k+1) = ?(k) - ? ?J(?)
? adalah learning rate. Nilai yang terlalu kecil membuat proses lambat, sedangkan
nilai yang terlalu besar dapat membuat solusi berosilasi atau tidak konvergen.
2.2 Gradient Descent untuk Regresi Linier
Untuk model linier:
? = a x + b
Fungsi loss yang digunakan:
J(a,b) = (1/m) ?(?? - y?)²
Gradient:
?J/?a = (2/m) ? x?(??-y?)
?J/?b = (2/m) ? (??-y?)
Pada data dengan nilai x besar, standardisasi membantu Gradient Descent bekerja
lebih stabil. Setelah model selesai, koefisien dapat dikembalikan ke skala asli.

3. Dataset Kalibrasi TDS
Gunakan data berikut. Kolom Sensor TDS digunakan sebagai input x, sedangkan TDS
Meter digunakan sebagai nilai referensi y.
| Pengujian  | Sensor TDS (ppm)  | TDS Meter (ppm)  |
| ---------- | ----------------- | ---------------- |
| 1          | 1368              | 1380             |
| 2          | 1370              | 1381             |
| 3          | 1374              | 1383             |
| 4          | 1376              | 1385             |
| 5          | 1378              | 1387             |
| 6          | 1371              | 1381             |
| 7          | 1375              | 1384             |
| 8          | 1377              | 1385             |
| 9          | 1378              | 1387             |
| 10         | 1380              | 1389             |
| 11         | 1370              | 1380             |
| 12         | 1372              | 1382             |
| 13         | 1374              | 1384             |
| 14         | 1377              | 1386             |
| 15         | 1379              | 1388             |
| 16         | 1372              | 1381             |

4. Persiapan Google Colab
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt

x = np.array([1368,1370,1374,1376,1378,1371,1375,1377,
              1378,1380,1370,1372,1374,1377,1379,1372], dtype=float)

y = np.array([1380,1381,1383,1385,1387,1381,1384,1385,
              1387,1389,1380,1382,1384,1386,1388,1381], dtype=float)
5. Percobaan
Percobaan 1 — Melihat Pengaruh Learning Rate
Sebelum menggunakan data sensor, coba Gradient Descent pada fungsi sederhana
agar pengaruh learning rate mudah diamati.
def f(x):
    return (x - 3)**2 + 2

def grad_f(x):
    return 2*(x - 3)

for alpha in [0.01, 0.1, 0.9, 1.05]:
    x0 = 8.0

cost = []
for k in range(30):
cost.append(f(x0))
x0 = x0 - alpha * grad_f(x0)
plt.plot(cost, label=f"alpha={alpha}")
plt.yscale("log")
plt.xlabel("Iterasi")
plt.ylabel("Cost")
plt.title("Pengaruh Learning Rate")
plt.grid()
plt.legend()
plt.show()
Analisis:
• Learning rate mana yang paling lambat?
• Learning rate mana yang cepat dan stabil?
• Apakah ada nilai yang menyebabkan osilasi atau tidak konvergen?
Percobaan 2 — Kalibrasi Sensor TDS dengan Gradient Descent
Karena nilai TDS berada di sekitar 1300 ppm, input distandardisasi terlebih dahulu.
x_mean = np.mean(x)
x_std = np.std(x)
z = (x - x_mean) / x_std
a = 0.0
b = np.mean(y)
alpha = 0.05
max_iter = 3000
cost_history = []
for k in range(max_iter):
y_pred = a*z + b
error = y_pred - y
cost = np.mean(error**2)
cost_history.append(cost)
da = 2*np.mean(z*error)
db = 2*np.mean(error)
a_new = a - alpha*da
b_new = b - alpha*db
if np.sqrt((a_new-a)**2 + (b_new-b)**2) < 1e-8:
a, b = a_new, b_new

break
a, b = a_new, b_new
# kembalikan ke skala x asli
slope = a / x_std
intercept = b - a*x_mean/x_std
y_hat = slope*x + intercept
rmse = np.sqrt(np.mean((y - y_hat)**2))
print("Slope =", slope)
print("Intercept =", intercept)
print("RMSE =", rmse)
print("Iterasi =", k+1)
plt.scatter(x, y, label="Data")
plt.plot(x, y_hat, label="Model GD")
plt.xlabel("Sensor TDS (ppm)")
plt.ylabel("TDS Meter (ppm)")
plt.title("Kalibrasi Sensor TDS")
plt.grid()
plt.legend()
plt.show()
Analisis:
• Tuliskan persamaan kalibrasi yang diperoleh.
• Berapa nilai RMSE model?
• Apakah hasil kalibrasi sudah cukup dekat dengan TDS Meter?
Percobaan 3 — Kurva Convergence dan Pembanding Least Squares
plt.figure(figsize=(7,4))
plt.plot(cost_history)
plt.xlabel("Iterasi")
plt.ylabel("MSE")
plt.title("Convergence Gradient Descent")
plt.grid()
plt.show()
# pembanding dengan least squares
X = np.column_stack([x, np.ones_like(x)])
beta_ls, _, _, _ = np.linalg.lstsq(X, y, rcond=None)
print("Gradient Descent :", slope, intercept)
print("Least Squares :", beta_ls)
Analisis:
• Pada iterasi ke berapa penurunan MSE mulai melambat?
• Apakah hasil Gradient Descent mendekati hasil least squares?
• Apa perbedaan utama metode iteratif dan metode langsung?

Percobaan 4 — Machine Learning Sederhana: Prediksi Suhu Heatsink
Contoh berikut menggunakan regresi linier berganda. Model memprediksi suhu
heatsink dari arus beban dan suhu lingkungan. Parameter model dipelajari
menggunakan Gradient Descent.
# x1 = arus beban (A)
# x2 = suhu lingkungan (°C)
# y = suhu heatsink (°C)
X = np.array([
[0.5, 27],
[0.8, 27],
[1.0, 28],
[1.2, 28],
[1.5, 29],
[1.8, 29],
[2.0, 30],
[2.2, 30],
[2.5, 31],
[2.8, 31],
[3.0, 32],
[3.2, 32]
], dtype=float)
y_temp = np.array([
31.0, 33.1, 34.8, 36.0, 38.6, 40.3,
42.1, 43.7, 46.1, 48.0, 49.8, 51.4
], dtype=float)
# standardisasi fitur
mean_X = X.mean(axis=0)
std_X = X.std(axis=0)
Z = (X - mean_X) / std_X
# tambah kolom 1 untuk bias
Zb = np.column_stack([np.ones(len(Z)), Z])
theta = np.zeros(Zb.shape[1])
alpha = 0.05
cost_history = []
for k in range(3000):
y_pred = Zb @ theta
error = y_pred - y_temp
cost = np.mean(error**2)
cost_history.append(cost)
grad = (2/len(y_temp)) * (Zb.T @ error)
theta_new = theta - alpha*grad

if np.linalg.norm(theta_new-theta) < 1e-8:
theta = theta_new
break
theta = theta_new
y_pred = Zb @ theta
rmse = np.sqrt(np.mean((y_temp-y_pred)**2))
print("Theta =", theta)
print("RMSE =", rmse)
plt.scatter(y_temp, y_pred)
plt.plot([y_temp.min(), y_temp.max()],
[y_temp.min(), y_temp.max()])
plt.xlabel("Suhu Aktual (°C)")
plt.ylabel("Suhu Prediksi (°C)")
plt.title("Prediksi Suhu Heatsink")
plt.grid()
plt.show()
Analisis:
• Apakah prediksi suhu mengikuti nilai aktual dengan baik?
• Berapa RMSE model?
• Mengapa fitur arus beban dan suhu lingkungan perlu distandardisasi?
• Bagaimana model ini dapat digunakan pada sistem monitoring suhu atau proteksi
perangkat elektronika?
6. Engineering Challenge
Challenge 1 — Kalibrasi TDS dengan Gradient Descent
1. Gunakan data 16 pengujian TDS pada modul.
2. Uji minimal tiga nilai learning rate.
3. Tampilkan persamaan kalibrasi, RMSE, dan grafik convergence.
4. Bandingkan hasil Gradient Descent dengan least squares.
5. Pilih learning rate yang paling layak dan jelaskan alasannya.
Challenge 2 — Model Machine Learning Sederhana untuk Elektronika
Gunakan data eksperimen sendiri atau data tugas akhir yang memiliki minimal dua
variabel input dan satu output. Contoh: suhu heatsink dari arus dan suhu
lingkungan, tegangan baterai dari beban dan waktu, atau keluaran sensor yang
dipengaruhi temperatur.
1. Tentukan fitur input dan target output.
2. Lakukan scaling/standardisasi bila diperlukan.
3. Latih regresi linier menggunakan Gradient Descent tanpa library optimizer.
4. Tampilkan learning curve dan RMSE.

5. Jelaskan arti model dari sisi sistem elektronika.
Fokus laporan bukan banyaknya eksperimen, tetapi kemampuan mahasiswa
menjelaskan hubungan fungsi loss, gradient, learning rate, convergence, dan hasil
model pada kasus elektronika.
7. Pertanyaan Evaluasi
1. Mengapa Gradient Descent bergerak berlawanan arah gradient?
2. Apa akibat learning rate terlalu kecil dan terlalu besar?
3. Mengapa data dengan skala sangat berbeda sebaiknya distandardisasi?
4. Apa fungsi stopping criterion?
5. Mengapa Gradient Descent dapat digunakan untuk melatih model regresi dan
neural network?
8. Referensi
1. Chapra, S. C., & Canale, R. P. (2021). Numerical Methods for Engineers (8th ed.).
McGraw Hill.
2. Nocedal, J., & Wright, S. J. (2006). Numerical Optimization (2nd ed.). Springer.
3. Boyd, S., & Vandenberghe, L. (2004). Convex Optimization. Cambridge University
Press.
4. Goodfellow, I., Bengio, Y., & Courville, A. (2016). Deep Learning. MIT Press.
5. NumPy Developers. NumPy Documentation.
