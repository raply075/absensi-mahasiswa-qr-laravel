# 🎓 Absensi Mahasiswa Berbasis QR Code

![Laravel](https://img.shields.io/badge/Laravel-13-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-blue?logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green)

Sistem Absensi Mahasiswa berbasis **QR Code** yang dikembangkan menggunakan **Laravel 13**. Aplikasi ini dirancang untuk mempermudah proses absensi mahasiswa secara digital, cepat, aman, dan real-time.

---

# 📸 Preview

### Landing Page

> <img width="1913" height="756" alt="image" src="https://github.com/user-attachments/assets/ddf1d614-45c6-4296-b190-35af2ea2a317" />


### Dashboard Admin

> <img width="1915" height="867" alt="image" src="https://github.com/user-attachments/assets/663eb280-2791-4e47-9e62-b79003a04263" />


### Dashboard Mahasiswa

> <img width="1912" height="858" alt="image" src="https://github.com/user-attachments/assets/733ea0ca-4672-4128-a74d-7d20c3f88e71" />


### QR Code Mahasiswa

> <img width="1912" height="863" alt="image" src="https://github.com/user-attachments/assets/5091bb5a-73b4-43b7-913c-cf4f0d1d766f" />


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

Copy file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Atur konfigurasi database pada file **.env**

```env
DB_DATABASE=absensi_mahasiswa
DB_USERNAME=root
DB_PASSWORD=
```

Migrasi dan Seeder

```bash
php artisan migrate --seed
```

Install Node Module

```bash
npm install
```

Compile Asset

```bash
npm run dev
```

Jalankan aplikasi

```bash
php artisan serve
```

---

# 🔑 Demo Account

## 👨‍💼 Admin

| Email           | Password |
| --------------- | -------- |
| admin@gmail.com | admin123 |

## 👨‍🎓 Mahasiswa

| Email           | Password |
| --------------- | -------- |
| raply@gmail.com | 12345678 |

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
Login
     │
     ▼
Generate QR Code
     │
     ▼
Scan QR Code
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
Dashboard & Laporan
```

---

# 👨‍💻 Developer

**Raply Fediansyah**

- GitHub : https://github.com/raply075
- Email : raply060104@gmail.com

---

# ⭐ Repository

Apabila project ini bermanfaat, jangan lupa memberikan ⭐ pada repository ini.
