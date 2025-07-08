<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Website Satgas PPKPT Universitas Tanjungpura

Website ini adalah platform digital resmi untuk Satuan Tugas Pencegahan dan Penanganan Kekerasas (Satgas PPK) Universitas Tanjungpura. Tujuan utama dari website ini adalah untuk menyediakan informasi, edukasi, dan layanan pelaporan terkait kekerasan di lingkungan kampus.

---

## Pengembang Awal

Proyek ini pertama kali dikembangkan dan dibangun oleh:
- **[Jimi Alvandi Mahendra](https://github.com/jimialvndi)**
- (Silahkan tambahkan nama anda disini jika anda menjadi developer selanjutnya)

---

## ✨ Fitur-fitur Utama

Berdasarkan kode yang ada, berikut adalah fitur-fitur yang telah diimplementasikan:

### 🌐 Halaman Publik (Frontend)
* **Beranda:** Halaman utama dengan *Hero Section* yang dinamis.
* **Tentang Kami:** Halaman yang menampilkan informasi mengenai Satgas PPKS.
* **Struktur Tim:** Menampilkan anggota tim Satgas PPKS.
* **Artikel:** Sistem blog untuk publikasi artikel edukasi, lengkap dengan halaman detail dan fitur berbagi ke media sosial.
* **Program Kerja:** Menampilkan daftar program kerja atau kegiatan yang akan/telah dilaksanakan.
* **Materi Edukasi:** Halaman untuk mengunduh atau melihat materi-materi edukasi.
* **Lapor!:** Formulir aduan bagi pengguna untuk melaporkan insiden secara daring.

### 🔐 Panel Admin (Backend)
* **Dashboard Utama:** Halaman ringkasan untuk admin.
* **Manajemen Pengguna (User):** Operasi CRUD (Create, Read, Update, Delete) untuk mengelola pengguna.
* **Manajemen Peran & Hak Akses (Roles & Permissions):** Mengelola peran (seperti Super-Admin, Admin) dan hak aksesnya untuk setiap fitur.
* **Manajemen Konten:**
    * CRUD untuk **Hero Section**.
    * CRUD untuk **Artikel**.
    * CRUD untuk **Program Kerja**.
    * CRUD untuk **Materi Edukasi**.
    * CRUD untuk **Halaman Tentang Kami**.
    * CRUD untuk **Anggota Tim**.
* **Manajemen Laporan:** Melihat dan mengelola laporan yang masuk dari publik.
* **Rich Text Editor:** Menggunakan Trix Editor untuk memudahkan penulisan konten seperti artikel dan program kerja, termasuk fitur unggah gambar.

---

## 💻 Teknologi yang Digunakan

Proyek ini dibangun menggunakan tumpukan teknologi modern, antara lain:

* **Backend:**
    * [PHP](https://www.php.net/)
    * [Laravel Framework](https://laravel.com/)
* **Frontend:**
    * [Vite](https://vitejs.dev/) - *Build tool* aset frontend.
    * [Tailwind CSS](https://tailwindcss.com/) - Kerangka kerja CSS.
    * [Alpine.js](https://alpinejs.dev/) - Kerangka kerja JavaScript minimalis.
* **Database:**
    * MySQL / MariaDB (sesuai konfigurasi Laravel).
* **Paket Utama:**
    * `spatie/laravel-permission`: Untuk manajemen peran dan hak akses.
    * [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) - Untuk sistem otentikasi dan *scaffolding* UI
