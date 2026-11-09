<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTE (PROFIL HOTEL & INFORMASI)
|--------------------------------------------------------------------------
*/

// 1. Halaman Beranda Utama
Route::get('/', [HotelController::class, 'index'])->name('home');

// 2. Menu Produk (Foto & Video Jenis Kamar: Standar, Deluxe, Family)
Route::get('/produk', [HotelController::class, 'products'])->name('products');

// 3. Menu Daftar Harga (Tabel Tarif & Ketentuan Menginap)
Route::get('/daftar-harga', [HotelController::class, 'prices'])->name('prices');

// 4. Menu Tentang Kami (Profil, Lokasi, Kontak Hotel)
Route::get('/tentang-kami', [HotelController::class, 'about'])->name('about');

/*
|--------------------------------------------------------------------------
| TRANSAKSI PEMESANAN KAMAR (BOOKING)
|--------------------------------------------------------------------------
*/

// Form Pemesanan Kamar
Route::get('/pesan-kamar', [BookingController::class, 'create'])->name('booking.create');
Route::post('/pesan-kamar', [BookingController::class, 'store'])->name('booking.store');

// Simulasi Hitung Total Bayar (AJAX / Fetch)
Route::post('/pesan-kamar/hitung', [BookingController::class, 'calculate'])->name('booking.calculate');

// Bukti Konfirmasi Pemesanan
Route::get('/pesanan/{booking}', [BookingController::class, 'show'])->name('booking.show');
Route::delete('/pesanan/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
