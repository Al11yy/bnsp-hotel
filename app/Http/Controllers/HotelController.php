<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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
     * Menampilkan halaman daftar harga: tarif resmi 3 tipe kamar, simulasi, & riwayat pemesanan.
     */
    public function prices()
    {
        $roomTypes = RoomType::orderBy('price', 'asc')->get();
        $bookings = Booking::with('roomType')->orderBy('created_at', 'desc')->get();

        return view('pages.prices', compact('roomTypes', 'bookings'));
    }

    /**
     * Menampilkan halaman tentang kami: profil hotel, alamat, nomor telepon, dan email.
     */
    public function about()
    {
        $hotelInfo = [
            'name' => 'JW Marriott Hotel Jakarta — Grand Harmoni',
            'tagline' => 'Kenyamanan Mewah, Sentuhan Hangat Indonesia',
            'description' => 'JW Marriott Hotel Jakarta — Grand Harmoni merupakan akomodasi hotel bintang 5 berkelas dunia yang berlokasi strategis di kawasan bisnis prestisius Mega Kuningan. Kami berkomitmen memberikan pelayanan terbaik, fasilitas kamar higienis, serta pengalaman menginap tak terlupakan untuk keperluan bisnis maupun liburan keluarga Anda.',
            'address' => 'Jl. DR. Ide Anak Agung Gde Agung Kav. E.1.2 No. 1 & 2, Kawasan Mega Kuningan, Jakarta Selatan (Jl. Boulevard Sudirman No. 88)',
            'phone' => '(021) 5798-8888 / (021) 555-8989',
            'email' => 'mhrs.jktjw.reservation@marriotthotels.com',
            'checkin_time' => '14.00 WIB',
            'checkout_time' => '12.00 WIB',
        ];

        return view('pages.about', compact('hotelInfo'));
    }

    /**
     * Mengalirkan video tur kamar hotel dengan dukungan HTTP 206 Partial Content (Byte-Range Streaming).
     * Memungkinkan pemutar video HTML5 untuk memajukan (fast-forward) dan memundurkan (rewind) video secara instan.
     */
    public function streamVideo(string $filename)
    {
        $cleanFilename = basename($filename);
        $path = public_path('assets/videos/rooms/'.$cleanFilename);

        if (! file_exists($path)) {
            abort(404, 'File video tidak ditemukan.');
        }

        return response()->file($path, [
            'Content-Type' => 'video/mp4',
            'Accept-Ranges' => 'bytes',
        ]);
    }
}
