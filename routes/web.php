<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

/**
 * Web Routes Configuration
 * Aplikasi Pemesanan Kamar Hotel - Sertifikasi BNSP Junior Web Developer
 * Author : Peserta Sertifikasi BNSP
 * Versi  : 1.0.0
 * Tanggal: 2026-11-02
 */

// 1. Menu Beranda Utama
Route::get('/', [HotelController::class, 'index'])->name('home');

// 2. Menu Produk (Foto & Video Jenis Kamar: Standar, Deluxe, Family)
Route::get('/produk', [HotelController::class, 'products'])->name('products');

// 3. Menu Daftar Harga (Tampilan Tabel Harga)
Route::get('/daftar-harga', [HotelController::class, 'prices'])->name('prices');

// 4. Menu Tentang Kami (Alamat, No Telp, Email Hotel)
Route::get('/tentang-kami', [HotelController::class, 'about'])->name('about');

// 5. Menu Pesan Kamar & Proses Transaksi Pemesanan
Route::prefix('pesan-kamar')->name('booking.')->group(function () {
    Route::get('/', [BookingController::class, 'create'])->name('create');
    Route::post('/', [BookingController::class, 'store'])->name('store');
    Route::post('/hitung', [BookingController::class, 'calculate'])->name('calculate');
});

// 6. Tampilan Hasil Pemesanan (Invoice) & Riwayat Transaksi
Route::get('/pesanan', [BookingController::class, 'index'])->name('booking.index');
Route::get('/pesanan/{booking}', [BookingController::class, 'show'])->name('booking.show');
