# UTS Pemrograman Web Service

Aplikasi CRUD Biodata menggunakan Laravel 13.

---

## ⚙️ Setup Setelah Clone dari GitHub

Jalankan perintah berikut **satu per satu** di terminal (PowerShell / CMD) dari folder project:

### 1. Install dependencies PHP
```bash
composer install
```

### 2. Buat file konfigurasi `.env`
```bash
copy .env.example .env
```

### 3. Generate Application Key
```bash
php artisan key:generate
```

> ⚠️ Langkah ini **wajib** — tanpa APP_KEY, fitur Edit dan Hapus akan error karena token CSRF gagal divalidasi.

### 4. Buat database & jalankan migrasi
```bash
php artisan migrate
```

### 5. Buat symlink untuk storage foto
```bash
php artisan storage:link
```

### 6. Jalankan server lokal
```bash
php artisan serve
```

Buka browser ke: **http://localhost:8000**

---

## 📋 Ringkasan Perintah (copy-paste sekaligus)

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan serve
```

---

## ❓ Troubleshoot

| Masalah | Solusi |
|---------|--------|
| Edit / Hapus error 419 atau 500 | Pastikan sudah `php artisan key:generate` |
| Foto tidak tampil | Pastikan sudah `php artisan storage:link` |
| Halaman error "Class not found" | Pastikan sudah `composer install` |
| Database error | Pastikan sudah `php artisan migrate` |

---

## 🗂️ Fitur

- ✅ Tambah biodata (nama, NIM, deskripsi, foto)
- ✅ Lihat semua biodata
- ✅ Edit biodata
- ✅ Hapus biodata
