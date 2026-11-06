<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\RoomType;
use Database\Seeders\RoomTypeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Feature Test : BookingTest
 * Deskripsi    : Menguji formulir pemesanan, validasi NIK 16 digit & durasi, penyimpanan ke SQLite, dan invoice
 * Author       : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi        : 1.0.0
 * Tanggal      : 2026-11-02
 */
class BookingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RoomTypeSeeder::class);
    }

    /**
     * Halaman formulir pemesanan dapat diakses dan menampilkan seluruh field input.
     */
    public function test_booking_create_page_is_accessible(): void
    {
        $response = $this->get(route('booking.create'));

        $response->assertStatus(200);
        $response->assertSee('Form Pemesanan');
        $response->assertSee('Nama Pemesan');
        $response->assertSee('Nomor Identitas');
        $response->assertSee('Tipe Kamar');
        $response->assertSee('Hitung Total Bayar');
    }

    /**
     * Validasi gagal jika Nomor Identitas bukan 16 digit angka ("isian salah..data harus 16 digit").
     */
    public function test_validation_fails_when_identity_number_is_not_16_digits(): void
    {
        $standar = RoomType::where('name', 'Standar')->firstOrFail();

        $response = $this->post(route('booking.store'), [
            'customer_name' => 'Budi Santoso',
            'gender' => 'Laki-laki',
            'identity_number' => '12345', // Hanya 5 digit
            'room_type_id' => $standar->id,
            'booking_date' => now()->toDateString(),
            'stay_duration' => '3',
            'include_breakfast' => false,
        ]);

        $response->assertSessionHasErrors([
            'identity_number' => 'isian salah..data harus 16 digit',
        ]);
    }

    /**
     * Validasi gagal jika Durasi Menginap bukan angka ("harus isi angka").
     */
    public function test_validation_fails_when_stay_duration_is_not_numeric(): void
    {
        $standar = RoomType::where('name', 'Standar')->firstOrFail();

        $response = $this->post(route('booking.store'), [
            'customer_name' => 'Budi Santoso',
            'gender' => 'Laki-laki',
            'identity_number' => '3275091210770004',
            'room_type_id' => $standar->id,
            'booking_date' => now()->toDateString(),
            'stay_duration' => 'tiga_hari', // Bukan angka
            'include_breakfast' => false,
        ]);

        $response->assertSessionHasErrors([
            'stay_duration' => 'harus isi angka',
        ]);
    }

    /**
     * Pengujian penyimpanan data berhasil sesuai skenario BNSP (Andri Santosa, NIK 16 Digit, 3 Hari).
     */
    public function test_successful_booking_stores_data_in_database_and_redirects(): void
    {
        $standar = RoomType::where('name', 'Standar')->firstOrFail();

        $payload = [
            'customer_name' => 'Andri Santosa',
            'gender' => 'Laki-laki',
            'identity_number' => '3275091210770004',
            'room_type_id' => $standar->id,
            'booking_date' => now()->toDateString(),
            'stay_duration' => '3',
            'include_breakfast' => 1,
        ];

        $response = $this->post(route('booking.store'), $payload);

        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'Andri Santosa',
            'identity_number' => '3275091210770004',
            'gender' => 'Laki-laki',
            'room_type_id' => $standar->id,
            'stay_duration' => 3,
            'include_breakfast' => 1,
            'breakfast_fee' => 80000,
        ]);

        $booking = Booking::where('identity_number', '3275091210770004')->firstOrFail();
        $response->assertRedirect(route('booking.show', $booking));

        // Buka halaman bukti pemesanan (Invoice)
        $invoiceResponse = $this->get(route('booking.show', $booking));
        $invoiceResponse->assertStatus(200);
        $invoiceResponse->assertSee('Andri Santosa');
        $invoiceResponse->assertSee('3275091210770004');
        $invoiceResponse->assertSee('Laki-laki');
        $invoiceResponse->assertSee('Standar');
        $invoiceResponse->assertSee('3 Hari');
    }

    /**
     * Pengujian kalkulasi diskon 10% untuk pemesanan lebih dari 3 hari.
     */
    public function test_booking_more_than_three_days_gets_ten_percent_discount(): void
    {
        $deluxe = RoomType::where('name', 'Deluxe')->firstOrFail();

        // 4 hari Deluxe (4 * 800.000 = 3.200.000 - 320.000 diskon = 2.880.000)
        $payload = [
            'customer_name' => 'Rina Wijaya',
            'gender' => 'Perempuan',
            'identity_number' => '3171015504880002',
            'room_type_id' => $deluxe->id,
            'booking_date' => now()->toDateString(),
            'stay_duration' => '4',
            'include_breakfast' => 0,
        ];

        $response = $this->post(route('booking.store'), $payload);

        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'Rina Wijaya',
            'stay_duration' => 4,
            'discount_percentage' => 10,
            'discount_amount' => 320000,
            'total_payment' => 2880000,
        ]);

        $booking = Booking::where('identity_number', '3171015504880002')->firstOrFail();
        $response->assertRedirect(route('booking.show', $booking));
    }
}
