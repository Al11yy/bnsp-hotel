<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Contracts\View\View;

/**
 * Controller  : HotelController
 * Deskripsi   : Mengelola halaman publik profil hotel (Beranda, Produk & Video, Daftar Harga, Tentang Kami)
 * Initial State : Permintaan halaman web dari browser pengunjung
 * Final State   : Merender view Blade dengan data yang relevan
 * Author      : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi       : 1.0.0
 * Tanggal     : 2026-11-02
 */
class HotelController extends Controller
{
    /**
     * Menampilkan halaman beranda aplikasi hotel.
     */
    public function index(): View
    {
        $roomTypes = RoomType::orderBy('price', 'asc')->get();

        return view('pages.home', [
            'roomTypes' => $roomTypes,
            'title' => 'Beranda - Hotel Grand Harmoni BNSP',
        ]);
    }

    /**
     * Menampilkan menu Produk: foto 3 jenis kamar (Standar, Deluxe, Family) dan video kamar hotel.
     */
    public function products(): View
    {
        $roomTypes = RoomType::orderBy('price', 'asc')->get();

        return view('pages.products', [
            'roomTypes' => $roomTypes,
            'title' => 'Produk & Kamar - Hotel Grand Harmoni BNSP',
        ]);
    }

    /**
     * Menampilkan menu Daftar Harga: tabel perbandingan harga sewa kamar hotel per malam.
     */
    public function prices(): View
    {
        $roomTypes = RoomType::orderBy('price', 'asc')->get();

        return view('pages.prices', [
            'roomTypes' => $roomTypes,
            'title' => 'Daftar Harga Kamar - Hotel Grand Harmoni BNSP',
        ]);
    }

    /**
     * Menampilkan menu Tentang Kami: alamat hotel, nomor telepon, dan email resmi.
     */
    public function about(): View
    {
        return view('pages.about', [
            'title' => 'Tentang Kami - Hotel Grand Harmoni BNSP',
            'hotelInfo' => [
                'name' => 'Hotel Grand Harmoni',
                'tagline' => 'Kenyamanan Mewah, Sentuhan Hangat Indonesia',
                'description' => 'Hotel Grand Harmoni merupakan akomodasi hotel bintang 4 modern yang berlokasi strategis di pusat kota. Kami berkomitmen memberikan pelayanan terbaik, fasilitas kamar higienis, serta pengalaman menginap tak terlupakan untuk keperluan bisnis maupun liburan keluarga Anda.',
                'address' => 'Jl. Boulevard Sudirman No. 88, Kav. 12, Jakarta Pusat, DKI Jakarta 10220',
                'phone' => '(021) 555-8989 / +62 812-3456-7890',
                'email' => 'reservation@grandharmonihotel.co.id',
                'checkin_time' => '14.00 WIB',
                'checkout_time' => '12.00 WIB',
            ],
        ]);
    }
}
