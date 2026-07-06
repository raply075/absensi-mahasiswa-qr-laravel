# 🎓 Absensi Mahasiswa Berbasis QR Code

![Laravel](https://img.shields.io/badge/Laravel-13-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-blue?logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green)

Sistem Absensi Mahasiswa berbasis **QR Code** yang dikembangkan menggunakan **Laravel 13**. Aplikasi ini dirancang untuk mempermudah proses absensi mahasiswa secara digital, cepat, aman, dan real-time.

---

## 📸 Preview

### Landing Page

> Tambahkan screenshot landing page di sini.

### Dashboard Admin

> Tambahkan screenshot dashboard admin.

### Dashboard Mahasiswa

> Tambahkan screenshot dashboard mahasiswa.

### QR Code Mahasiswa

> Tambahkan screenshot QR Code.

---

# ✨ Fitur

- 🔐 Login Multi Role (Admin & Mahasiswa)
- 👨‍🎓 Manajemen Data Mahasiswa
- 🏫 Manajemen Data Kelas
- 📱 Generate QR Code Mahasiswa
- 📷 Scan QR Code untuk Absensi
- ✅ Validasi Absensi (1 kali per hari)
- 📊 Dashboard Statistik
- 📈 Grafik Absensi (Chart.js)
- 📄 Export PDF
- 📗 Export Excel
- 🔍 Filter Data Absensi
- 🔔 SweetAlert2 Notification
- 📱 Responsive Design

---

# 🛠 Tech Stack

| Technology    | Version |
| ------------- | ------- |
| Laravel       | 13      |
| PHP           | 8.3     |
| MySQL         | Latest  |
| Tailwind CSS  | Latest  |
| Chart.js      | Latest  |
| SweetAlert2   | Latest  |
| DomPDF        | Latest  |
| Laravel Excel | Latest  |

---

# ⚙️ Installation

Clone repository

```bash
git clone https://github.com/raply075/absensi-mahasiswa-qr-laravel.git
```

Masuk ke project

```bash
cd absensi-mahasiswa-qr-laravel
```

Install dependency

```bash
composer install
```

Copy file .env

```bash
cp .env.example .env
```

Generate Key

```bash
php artisan key:generate
```

Install Node Module

```bash
npm install
```

Compile Asset

```bash
npm run dev
```

Migrasi Database

```bash
php artisan migrate
```

Jalankan Server

```bash
php artisan serve
```

---

# 📂 Struktur Fitur

```
Admin
│
├── Dashboard
├── Data Mahasiswa
├── Data Kelas
├── Data Absensi
├── Generate QR Code
├── Scan QR Code
├── Export PDF
└── Export Excel

Mahasiswa
│
├── Dashboard
├── Profil
├── Statistik Absensi
├── Grafik
└── Riwayat Absensi
```

---

# 📌 Flow Sistem

```
Mahasiswa
     │
     ▼
Generate QR Code
     │
     ▼
Scan QR
     │
     ▼
Validasi QR
     │
     ▼
Cek Absensi Hari Ini
     │
     ▼
Simpan Database
     │
     ▼
Dashboard
```

---

# 👨‍💻 Developer

**Raply Fediansyah**

GitHub

https://github.com/raply075

---

# ⭐ Repository

Jika project ini bermanfaat, jangan lupa memberikan ⭐ pada repository ini.
