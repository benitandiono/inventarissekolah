# Sistem Inventaris Sekolah Berbasis Web

Desain aplikasi dengan konsep  
## Modern, Transparan & Profesional  
untuk manajemen inventaris sekolah.

---

# ✨ Fitur Aplikasi

## 🔐 Keamanan & Akses Pengguna
- **Single Session**  
  Satu akun hanya dapat login dari satu perangkat pada saat bersamaan.

- **Reset Password & Reset Sesi Login**  
  Super Admin dapat mengelola akses pengguna dengan mudah.

- **Manajemen Pengguna & Role**  
  Mendukung berbagai role dan hak akses sesuai tanggung jawab masing-masing pengguna.

---

## 🏢 Manajemen Inventaris
- **Manajemen Aset Tetap**  
  Input aset baru, riwayat aset terhapus, serta export laporan PDF & Excel.

- **Manajemen Data Barang Bertahap**  
  Input kategori, satuan, kemudian data barang agar lebih terstruktur.

- **Kelola Data Relasi**  
  Manajemen data supplier serta data guru & tenaga kependidikan.

---

## 📦 Transaksi & Monitoring
- **Barang Masuk & Barang Keluar**  
  Pencatatan transaksi real-time dengan validasi stok minimal.

- **Pelaporan & Monitoring**  
  Tersedia 3 sub menu laporan:
  - Laporan Stok Barang
  - Laporan Barang Masuk
  - Laporan Barang Keluar

- **Monitoring Aktivitas User**  
  Super Admin dan Admin dapat melihat seluruh aktivitas pengguna dalam sistem.

---

## ✅ Validasi Sistem
- **Pencegahan Data Aset Ganda**  
  Sistem otomatis mendeteksi aset duplikat.

- **Validasi Data Barang**  
  Memastikan kategori, satuan, dan barang tetap unik.

- **Riwayat Penghapusan Aset**  
  Seluruh aset yang dihapus tercatat untuk audit trail.

- **Validasi Stok Minimal**  
  Sistem mencegah pengeluaran barang di bawah batas minimal.

---

## ⚙️ Konfigurasi & Bantuan
- **Custom Nama Instansi**  
  Super Admin dapat mengubah nama sekolah dan konfigurasi dasar sistem.

- **Panduan & Alur Penggunaan Sistem**  
  Membantu pengguna memahami cara kerja aplikasi secara lengkap.

---

# 🚀 Teknologi Yang Digunakan
- Laravel 12.x
- PHP 8.x
- MySQL
- Bootstrap / Tailwind CSS
- JavaScript
- Chart.js
- DomPDF
- Laravel Excel


# ⚙️ Instalasi Aplikasi

Ikuti langkah berikut untuk menjalankan aplikasi di komputer lokal.

---

## 📥 1. Clone Repository

Lakukan clone project atau download manual repository ini.

```bash
git clone https://github.com/benitandiono/inventarissekolah.git
```

Masuk ke folder project:

```bash
cd inventarissekolah
```

---

## 🗄️ 2. Buat Database

Buat database baru di MySQL / phpMyAdmin dengan nama:

```bash
inventarissekolah
```

---

## ⚙️ 3. Konfigurasi File Environment

Rename file:

```bash
.env.example
```

menjadi:

```bash
.env
```

Kemudian hubungkan database pada file `.env`:

```env
DB_DATABASE=inventarissekolah
DB_USERNAME=root
DB_PASSWORD=
```

---

## 📦 4. Install Dependency

Jalankan perintah berikut pada terminal:

```bash
composer install
```

Lalu generate key aplikasi:

```bash
php artisan key:generate
```

---

## 🛠️ 5. Migrasi & Seeder Database

Jalankan migrasi database:

```bash
php artisan migrate
```

Kemudian jalankan seeder:

```bash
php artisan migrate:fresh --seed
```

---

## ▶️ 6. Jalankan Aplikasi

```bash
php artisan serve
```

---

## 🌐 7. Akses Aplikasi

Buka browser dan akses:

```bash
http://127.0.0.1:8000
```

---

## 📸 Tampilan Aplikasi

### 🏠 Dashboard
![Dashboard](images/dashboard.png)

---

### 🏢 Manajemen Aset
![Aset](images/aset.png)

---

### 📦 Data Barang
![Barang](images/barang.png)

---

### 👥 Manajemen Pengguna
![Pengguna](images/pengguna.png)

---

### 🔐 Manajemen Role & Hak Akses
![Role](images/role.png)

---

### ⚙️ Pengaturan Sistem
![Pengaturan](images/pengaturan.png)

---

### 📋 Aktivitas Pengguna
![Aktivitas](images/aktivitas.png)



