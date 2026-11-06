# bnsp-hotel
## Aplikasi Pemesanan Kamar Hotel - Grand Harmoni
### Tugas Praktik Demonstrasi (FR.IA.02)
**Skema Sertifikasi / Okupasi Nasional:** Junior Web Developer  
**Nomor Skema:** FR.SKEMA-02-07  
**LSP Penyelenggara:** LSP Informatika / BNSP  
**Tahun:** 2026  

---

## 📋 1. Deskripsi Proyek
Aplikasi Pemesanan Kamar Hotel **Grand Harmoni** adalah sistem reservasi kamar hotel berbasis web yang dibangun untuk memenuhi seluruh kriteria unjuk kerja pada skema asesmen **Junior Web Developer**. Sistem ini menerapkan arsitektur *Model-View-Controller* (MVC) berstandar tinggi, desain antarmuka modern yang responsif, validasi data berlapis (klien & server), serta interaktivitas menggunakan Vanilla JavaScript murni tanpa ketergantungan library eksternal.

---

## 🛠️ 2. Tech Stack & Spesifikasi Lingkungan
1. **Backend (BE)**:
   * **Bahasa Pemrograman:** PHP 8.5+
   * **Framework:** Laravel 12
   * **Database:** SQLite (`database/database.sqlite`)
   * **Arsitektur:** MVC (Model - View - Controller) & Form Request Validation
2. **Frontend (FE)**:
   * **Template Engine:** Laravel Blade (`.blade.php`) - Server-Side Rendering (SSR)
   * **Styling / CSS:** Tailwind CSS v4 (dikompilasi dengan Vite 8)
   * **Interaktivitas:** Vanilla JavaScript murni bawaan browser (Auto-focus, dynamic price loader, validasi input NIK & durasi, auto kalkulasi diskon & sarapan, aktif/pasif tombol simpan)
3. **Multimedia (Butir c)**:
   * **Foto:** Dokumentasi 3 jenis kamar (Standar, Deluxe, Family) berformat SVG & WebP lokal.
   * **Video:** Video tur interaktif HTML5 lokal dengan tab switcher untuk setiap jenis kamar.

---

## 📐 3. Struktur & Hierarki Direktori Program
*(Memenuhi Rubrik BNSP Halaman 4 Butir 2.2: Mengorganisasikan sumber daya pemrograman sesuai konteks)*

```text
hotel-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HotelController.php        # Menangani halaman publik (Beranda, Produk & Video, Daftar Harga, Tentang Kami)
│   │   │   └── BookingController.php      # Menangani transaksi pemesanan (Form, Kalkulasi, Simpan SQLite, dan Invoice)
│   │   └── Requests/
│   │       └── StoreBookingRequest.php    # Validasi server-side form pemesanan dengan pesan galat spesifik BNSP
│   └── Models/
│       ├── RoomType.php                   # Model master data jenis kamar & format harga
│       └── Booking.php                    # Model transaksi reservasi & algoritma kalkulasi diskon
├── database/
│   ├── database.sqlite                    # File basis data SQLite lokal
│   ├── migrations/
│   │   ├── 2026_11_02_080341_create_room_types_table.php  # Skema tabel master tipe kamar
│   │   └── 2026_11_02_080352_create_bookings_table.php    # Skema tabel transaksi reservasi kamar
│   └── seeders/
│       ├── RoomTypeSeeder.php             # Seeder 3 tipe kamar (Standar, Deluxe, Family)
│       ├── BookingSeeder.php              # Seeder contoh data pemesanan (Andri Santosa)
│       └── DatabaseSeeder.php             # Master runner seeder
├── public/
│   ├── assets/
│   │   ├── images/rooms/                  # Aset foto visual kamar hotel (standar, deluxe, family)
│   │   └── videos/rooms/                  # Aset video tur jenis kamar lokal (hotel_tour.mp4, dll)
│   └── build/                             # Aset terkompilasi Vite (CSS & JS produksi)
├── resources/
│   ├── css/
│   │   └── app.css                        # Konfigurasi Tailwind CSS v4
│   ├── js/
│   │   └── app.js                         # Script frontend JavaScript
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php              # Layout induk: Navbar, Mobile Drawer, Flash Alert, Footer
│       └── pages/
│           ├── home.blade.php             # Menu Beranda: Hero banner, cuplikan produk, video player, daftar harga
│           ├── products.blade.php         # Menu Produk: Foto 3 tipe kamar & pemutar video tur interaktif
│           ├── prices.blade.php           # Menu Daftar Harga: Tampilan tabel perbandingan harga sewa
│           ├── about.blade.php            # Menu Tentang Kami: Deskripsi profil, alamat, telepon, dan email hotel
│           ├── booking.blade.php          # Menu Pesan Kamar: Formulir pemesanan dengan interaktivitas Vanilla JS
│           ├── booking-success.blade.php  # Tampilan bukti pemesanan (Invoice) format persis Butir b
│           └── booking-list.blade.php     # Rekap data transaksi yang tersimpan di SQLite
├── routes/
│   └── web.php                            # Rute URL aplikasi dengan penamaan terstruktur (named routes)
├── tests/
│   ├── Feature/
│   │   ├── HotelPagesTest.php             # Pengujian aksesibilitas seluruh halaman menu hotel
│   │   └── BookingTest.php                # Pengujian form validasi, kalkulasi, & penyimpanan data
│   └── Unit/
│       └── BookingCalculationTest.php     # Pengujian algoritma diskon 10% dan sarapan
├── composer.json                          # Ketergantungan pustaka backend PHP
├── package.json                           # Ketergantungan pustaka frontend & build tools
└── README.md                              # Dokumentasi lengkap petunjuk teknis proyek
```

---

## 💼 4. Aturan Bisnis & Logika Pemrograman (Skenario BNSP)

### A. Tipe Kamar & Tarif Dasar
| No | Tipe Kamar | Tarif / Malam | Kapasitas | Tipe Ranjang |
|:--:|:-----------|:-------------:|:---------:|:-------------|
| 1 | **Standar** | Rp 500.000 | 2 Orang | 1 Queen Bed (160x200 cm) |
| 2 | **Deluxe** | Rp 800.000 | 2-3 Orang | 1 King Bed (180x200 cm) |
| 3 | **Family** | Rp 1.200.000 | 4-5 Orang | 2 Queen Bed (160x200 cm) |

### B. Aturan Isian Formulir & Validasi
1. **Nama Pemesan**: Input teks wajib diisi. Otomatis menerima fokus kursor (*auto-focus*) saat halaman dibuka.
2. **Jenis Kelamin**: Radio button pilihan (*Laki-laki* atau *Perempuan*).
3. **Nomor Identitas**: Wajib berupa 16 digit angka. Jika tidak 16 digit atau terdapat karakter bukan angka, sistem memunculkan pesan peringatan:
   ```text
   isian salah..data harus 16 digit
   ```
4. **Tipe Kamar**: Dropdown select. Saat dipilih, input harga terisi otomatis secara *readonly*.
5. **Tanggal Pesan**: Input tanggal dengan format standar `dd/mm/yyyy`.
6. **Durasi Menginap**: Wajib berupa angka bulat positif (satuan Hari). Jika diisi huruf atau karakter selain angka, sistem memunculkan pesan peringatan:
   ```text
   harus isi angka
   ```
7. **Termasuk Breakfast**: Checkbox pilihan. Jika dicentang (Ya), dikenakan tambahan biaya tetap sebesar **Rp 80.000**.
8. **Total Bayar**: Terisi otomatis saat tombol **"Hitung Total Bayar"** diklik, dengan rumus perhitungan:
   $$\text{Subtotal Kamar} = \text{Harga Kamar} \times \text{Durasi}$$
   $$\text{Diskon} = \begin{cases} 10\% \times \text{Subtotal Kamar}, & \text{jika Durasi} > 3 \text{ hari} \\ 0, & \text{jika Durasi} \le 3 \text{ hari} \end{cases}$$
   $$\text{Biaya Sarapan} = \begin{cases} \text{Rp } 80.000, & \text{jika Cekbox Breakfast dicentang} \\ 0, & \text{jika tidak} \end{cases}$$
   $$\text{Total Bayar} = (\text{Subtotal Kamar} - \text{Diskon}) + \text{Biaya Sarapan}$$
9. **Status Tombol Simpan**: 
   * Tombol **Simpan** berada dalam keadaan nonaktif (*disabled*) secara default.
   * Tombol baru menjadi aktif (*enabled*) setelah pengguna menekan tombol **"Hitung Total Bayar"** dan seluruh validasi terpenuhi.
   * Jika ada perubahan isian formulir setelah dihitung, tombol Simpan kembali dinonaktifkan hingga dihitung ulang.
10. **Tombol Cancel**: Mereset seluruh formulir ke kondisi awal, membersihkan pesan galat, dan mengembalikan fokus kursor ke field Nama Pemesan.

### C. Tampilan Hasil Isian Data (Halaman 3 Butir b)
Setelah form disubmit dan berhasil disimpan ke database SQLite, sistem mengarahkan ke halaman struk invoice yang menampilkan rincian:
```text
Nama Pemesan      : Andri Santosa
Nomor Identitas   : 3275091210770004
Jenis Kelamin     : Laki-laki
Tipe Kamar        : Standar
Duras Penginapan  : 3 Hari
Discount          : 10%
Total Bayar       : 1.590.000
```
Tersedia tombol **"Cetak Bukti Pemesanan"** yang memicu dialog pencetakan printer (`window.print()`).

---

## 🚀 5. Panduan Instalasi & Menjalankan Aplikasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di lingkungan lokal:

### 1. Kebutuhan Sistem
* PHP 8.2 atau lebih tinggi (disarankan PHP 8.5)
* Composer 2.x
* Node.js (v18+) & NPM

### 2. Konfigurasi Awal
Buka terminal pada folder proyek `hotel-app`:

```bash
# 1. Salin konfigurasi environment jika belum ada
cp .env.example .env

# 2. Generate Application Key (jika belum ada)
php artisan key:generate

# 3. Buat database SQLite dan jalankan migrasi beserta data awal (seeder)
php artisan migrate:fresh --seed
```

### 3. Kompilasi Aset Frontend (Tailwind CSS v4 & Vite)
```bash
# Install paket dependensi npm
npm install

# Kompilasi aset untuk produksi
npm run build
```

### 4. Menjalankan Web Server Lokal
Jalankan server pengembangan Laravel (port 8002 jika port 8000 dan 8001 sedang digunakan):
```bash
php artisan serve --port=8002
```
Buka browser dan akses aplikasi melalui tautan:  
👉 **[http://localhost:8002](http://localhost:8002)**

---

## 🧪 6. Pengujian Otomatis (Testing)
Aplikasi telah dilengkapi dengan unit test dan feature test (16 pengujian otomatis, 70 assertions) untuk memverifikasi seluruh skenario pengujian:

```bash
php artisan test --compact
```

Hasil pengujian mencakup:
* ✅ Pengujian kalkulasi tarif kamar dan diskon 10% untuk masa inap > 3 hari.
* ✅ Pengujian kalkulasi biaya tambahan sarapan (Rp 80.000).
* ✅ Pengujian aksesibilitas 4 menu utama: Beranda, Produk & Video, Daftar Harga, dan Tentang Kami.
* ✅ Pengujian validasi penolakan jika NIK bukan 16 digit angka (`isian salah..data harus 16 digit`).
* ✅ Pengujian validasi penolakan jika durasi bukan angka (`harus isi angka`).
* ✅ Pengujian integritas penyimpanan data pemesanan ke tabel SQLite dan tampilan invoice.

---

## ✍️ 7. Keterangan Hak Cipta & Standarisasi Penulisan Kode
Setiap file pengendali (*controller*), model, validasi *request*, migrasi skema, dan template *view* telah dilengkapi blok komentar dokumentasi (*DocBlock*) standar yang memuat:
* **Deskripsi:** Tujuan dan fungsi kode program
* **Initial State:** Kondisi data atau sistem sebelum fungsi dieksekusi
* **Final State:** Hasil akhir yang diharapkan setelah eksekusi
* **Author:** Peserta Uji Kompetensi Sertifikasi BNSP
* **Versi & Tanggal:** Versi 1.0.0 (2026-11-02)
