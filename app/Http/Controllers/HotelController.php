<?php

namespace App\Http\Controllers;

use App\Models\RoomType;

class HotelController extends Controller
{
    /**
     * Menampilkan halaman beranda utama hotel.
     */
    public function index()
    {
        $roomTypes = RoomType::orderBy('price', 'asc')->get();

        return view('pages.home', compact('roomTypes'));
    }

    /**
     * Menampilkan halaman produk: 3 jenis kamar (Standar, Deluxe, Family) & video tur.
     */
    public function products()
    {
        $roomTypes = RoomType::orderBy('price', 'asc')->get();

        return view('pages.products', compact('roomTypes'));
    }

    /**
     * Menampilkan halaman daftar harga: tarif resmi 3 tipe kamar & ketentuan sewa.
     */
    public function prices()
    {
        $roomTypes = RoomType::orderBy('price', 'asc')->get();

        return view('pages.prices', compact('roomTypes'));
    }

    /**
     * Menampilkan halaman tentang kami: profil hotel, alamat, nomor telepon, dan email.
     */
    public function about()
    {
        $hotelInfo = [
            'name' => 'Hotel Grand Harmoni',
            'tagline' => 'Kenyamanan Mewah, Sentuhan Hangat Indonesia',
            'description' => 'Hotel Grand Harmoni merupakan akomodasi hotel bintang 4 modern yang berlokasi strategis di pusat kota. Kami berkomitmen memberikan pelayanan terbaik, fasilitas kamar higienis, serta pengalaman menginap tak terlupakan untuk keperluan bisnis maupun liburan keluarga Anda.',
            'address' => 'Jl. Boulevard Sudirman No. 88, Kav. 12, Jakarta Pusat, DKI Jakarta 10220',
            'phone' => '(021) 555-8989 / +62 812-3456-7890',
            'email' => 'reservation@grandharmonihotel.co.id',
            'checkin_time' => '14.00 WIB',
            'checkout_time' => '12.00 WIB',
        ];

        return view('pages.about', compact('hotelInfo'));
    }
}
