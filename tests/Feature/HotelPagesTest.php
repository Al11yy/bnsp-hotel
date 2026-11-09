<?php

namespace Tests\Feature;

use Database\Seeders\RoomTypeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Feature Test : HotelPagesTest
 * Deskripsi    : Menguji ketersediaan halaman publik hotel (Beranda, Produk & Video, Tentang Kami)
 * Author       : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi        : 2.0.0
 * Tanggal      : 2026-11-09
 */
class HotelPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RoomTypeSeeder::class);
    }

    /**
     * Halaman beranda dapat diakses dan menampilkan nama hotel serta 3 tipe kamar.
     */
    public function test_home_page_is_accessible(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('GRAND HARMONI');
        $response->assertSee('Standar');
        $response->assertSee('Deluxe');
        $response->assertSee('Family');
    }

    /**
     * Halaman produk menampilkan 3 jenis kamar beserta video tour.
     */
    public function test_products_page_is_accessible_and_shows_rooms_and_video(): void
    {
        $response = $this->get(route('products'));

        $response->assertStatus(200);
        $response->assertSee('Koleksi Kamar');
        $response->assertSee('Standar');
        $response->assertSee('Deluxe');
        $response->assertSee('Family');
        $response->assertSee('video-source');
    }

    /**
     * Halaman tentang kami menampilkan alamat, no telepon, dan email resmi hotel.
     */
    public function test_about_page_is_accessible_and_shows_contact_info(): void
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
        $response->assertSee('Tentang Hotel Grand Harmoni');
        $response->assertSee('Jl. Boulevard Sudirman No. 88');
        $response->assertSee('(021) 555-8989');
        $response->assertSee('reservation@grandharmonihotel.co.id');
    }

    /**
     * Halaman daftar harga dapat diakses dan menampilkan tarif 3 jenis kamar serta ketentuan sarapan per hari.
     */
    public function test_prices_page_is_accessible_and_shows_price_list(): void
    {
        $response = $this->get(route('prices'));

        $response->assertStatus(200);
        $response->assertSee('Daftar Harga Kamar Hotel');
        $response->assertSee('Standar');
        $response->assertSee('Deluxe');
        $response->assertSee('Family');
        $response->assertSee('Rp 80.000');
        $response->assertSee('Riwayat Pemesanan');
        $response->assertSee(route('booking.index'));
    }

    /**
     * Endpoint video streaming mendukung HTTP 206 Partial Content (Byte-Range) untuk fast-forward dan rewind.
     */
    public function test_video_streaming_route_supports_byte_range_requests(): void
    {
        $response = $this->withHeaders([
            'Range' => 'bytes=0-100',
        ])->get(route('video.stream', ['filename' => 'hotel_tour.mp4']));

        $response->assertStatus(206);
        $response->assertHeader('Accept-Ranges', 'bytes');
        $this->assertStringStartsWith('bytes 0-100/', $response->headers->get('Content-Range'));
    }

    /**
     * Endpoint video streaming mengembalikan 404 jika file video tidak ada.
     */
    public function test_video_streaming_route_returns_404_for_missing_file(): void
    {
        $response = $this->get(route('video.stream', ['filename' => 'non_existent_video.mp4']));

        $response->assertStatus(404);
    }
}
