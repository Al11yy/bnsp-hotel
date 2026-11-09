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
}
