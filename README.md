# Sensor pH DFRobot V1.1 dengan Kalibrasi 3 Titik dan Pemeriksaan Deviasi

## Deskripsi

Projek Arduino ini merupakan implementasi sensor pH DFRobot dengan kemampuan kalibrasi 3 titik (pH 4.00, pH 7.00, dan pH 10.00) serta fitur pendeteksian deviasi untuk memastikan akurasi pembacaan. Data kalibrasi disimpan dalam EEPROM agar tidak hilang saat power dimatikan.

## Fitur

- Kalibrasi 3 titik untuk akurasi maksimal (pH 4.00, pH 7.00, pH 10.00)
- Penyimpanan data kalibrasi di EEPROM
- Pemeriksaan deviasi untuk mendeteksi pembacaan tidak valid
- Deteksi probe yang tidak terendam dalam larutan
- Filter rata-rata untuk mengurangi noise
- Perhitungan pH menggunakan interpolasi linear antara titik kalibrasi

## Komponen yang Dibutuhkan

- Board Arduino (Uno, Nano, atau yang sejenis)
- Sensor pH DFRobot V1.1
- Kabel jumper
- Larutan buffer pH 4.00, 7.00, dan 10.00 untuk kalibrasi

## Koneksi Pin

Sensor pH terhubung ke pin analog A0 pada Arduino.

## Cara Penggunaan

### 1. Instalasi dan Upload Kode

1. Buka Arduino IDE
2. Muat file `PH_DFROBOT_V1_1_KALIBRASI_3_TITIK_DEVIATION.ino`
3. Hubungkan sensor pH ke pin A0
4. Upload program ke Arduino

### 2. Proses Kalibrasi

#### Langkah 1: Kalibrasi pH 4.00
1. Rendam probe sensor dalam larutan buffer pH 4.00
2. Tunggu hingga pembacaan stabil
3. Ketik perintah `calph4` di Serial Monitor dan tekan Enter
4. Sistem akan menyimpan nilai ADC untuk pH 4.00

#### Langkah 2: Kalibrasi pH 7.00
1. Bersihkan probe, lalu rendam dalam larutan buffer pH 7.00
2. Tunggu hingga pembacaan stabil
3. Ketik perintah `calph7` di Serial Monitor dan tekan Enter
4. Sistem akan menyimpan nilai ADC untuk pH 7.00

#### Langkah 3: Kalibrasi pH 10.00
1. Bersihkan probe, lalu rendam dalam larutan buffer pH 10.00
2. Tunggu hingga pembacaan stabil
3. Ketik perintah `calph10` di Serial Monitor dan tekan Enter
4. Sistem akan menyimpan nilai ADC untuk pH 10.00

### 3. Perintah yang Tersedia

- `calph4`: Kalibrasi dengan larutan buffer pH 4.00
- `calph7`: Kalibrasi dengan larutan buffer pH 7.00
- `calph10`: Kalibrasi dengan larutan buffer pH 10.00
- `showcal`: Menampilkan data kalibrasi yang tersimpan

### 4. Membaca Data pH

Setelah kalibrasi selesai, sensor akan menampilkan data pH setiap detik dengan format:
```
ADC: [nilai] | Volt: [tegangan] | Dev: [deviasi] | pH: [nilai pH]
```

### 5. Indikator Error

Sistem akan memberikan peringatan jika:
- **Deviasi tinggi (>20)**: Pembacaan tidak stabil, mungkin probe tidak terendam dengan benar
- **Tegangan rendah (<0.2V) atau terlalu tinggi (>4.8V)**: Ada masalah dengan koneksi atau probe

## Cara Kerja Program

### 1. Sistem Kalibrasi

Program menggunakan 3 titik kalibrasi untuk menghitung pH dengan metode interpolasi linear:

- **Segment 1 (pH 4-7)**: Menggunakan gradien antara titik pH 4 dan pH 7
- **Segment 2 (pH 7-10)**: Menggunakan gradien antara titik pH 7 dan pH 10

Rumus yang digunakan:
```
Untuk ADC < ph7ADC: pH = 4.0 + m1 * (ADC - ph4ADC)
Untuk ADC ≥ ph7ADC: pH = 7.0 + m2 * (ADC - ph7ADC)
```

dimana:
- m1 = (7.0 - 4.0) / (ph7ADC - ph4ADC)
- m2 = (10.0 - 7.0) / (ph10ADC - ph7ADC)

### 2. Pemeriksaan Deviasi

Program menghitung simpangan baku (standard deviation) dari 40 sampel terakhir untuk mendeteksi pembacaan yang tidak valid. Deviasi tinggi menunjukkan pembacaan yang tidak stabil.

### 3. Penyimpanan Data

Data kalibrasi disimpan dalam EEPROM dengan alamat:
- `ph4ADC`: Alamat 0-1 (2 bytes)
- `ph7ADC`: Alamat 2-3 (2 bytes)  
- `ph10ADC`: Alamat 4-5 (2 bytes)

## Troubleshooting

### Masalah Umum

1. **Pembacaan tidak stabil**
   - Pastikan probe terendam dengan benar dalam larutan
   - Bersihkan probe dengan air suling
   - Tunggu beberapa saat hingga pembacaan stabil

2. **Nilai pH tidak akurat**
   - Lakukan ulang proses kalibrasi dengan larutan buffer yang segar
   - Pastikan probe dan buffer berada pada suhu ruang yang sama

3. **Error "Probe not in solution"**
   - Pastikan probe benar-benar terendam dalam larutan
   - Periksa koneksi antara sensor dan Arduino

### Tips Pemeliharaan Probe

- Simpan probe dalam larutan KCl 3M saat tidak digunakan
- Hindari menyentuh bulb probe dengan tangan
- Bersihkan probe dengan air suling setiap penggunaan
- Ganti probe secara berkala (umumnya setiap 6-12 bulan)

## Lisensi

Proyek ini dirilis dengan lisensi open source. Anda bebas menggunakan, memodifikasi, dan mendistribusikan kode ini sesuai kebutuhan.

## Kontribusi

Kontribusi dalam bentuk perbaikan kode, dokumentasi, atau fitur baru sangat disambut.
