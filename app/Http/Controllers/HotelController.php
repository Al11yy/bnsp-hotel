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
     * Mengarahkan halaman daftar harga ke halaman koleksi kamar & tarif resmi.
     */
    public function prices()
    {
        return redirect()->route('products');
    }

    /**
     * Menampilkan halaman tentang kami: profil hotel, alamat, nomor telepon, dan email.
     */
    public function about()
    {
        $hotelInfo = [
            'name' => 'JW Marriott Hotel Jakarta',
            'tagline' => 'Kemewahan Bintang 5 di Kawasan Mega Kuningan',
            'description' => 'JW Marriott Hotel Jakarta merupakan hotel mewah bintang 5 yang berlokasi strategis di kawasan bisnis dan diplomatik prestisius Mega Kuningan, Jakarta Selatan. Menghadirkan kamar berpanorama kota yang luas, tempat tidur mewah signature Marriott Revive, layanan kuliner kelas dunia di Sailendra Restaurant dan Pearl Chinese Restaurant, serta keramahan legendaris khas JW Marriott.',
            'address' => 'Jl. DR. Ide Anak Agung Gde Agung Kav. E.1.2 No. 1 & 2, Kawasan Mega Kuningan (Akses: Jl. Boulevard Sudirman No. 88), Jakarta Selatan 12950',
            'phone' => '(021) 5798-8888 / (021) 555-8989',
            'email' => 'reservation@jwmarriottjakarta.com / reservation@grandharmonihotel.co.id',
            'checkin_time' => '14.00 WIB',
            'checkout_time' => '12.00 WIB',
        ];

        return view('pages.about', compact('hotelInfo'));
    }
}
