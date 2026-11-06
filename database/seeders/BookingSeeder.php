<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

/**
 * Seeder     : BookingSeeder
 * Deskripsi  : Mengisi contoh data transaksi pemesanan sesuai lembar soal BNSP
 * Initial State : Tabel bookings kosong
 * Final State   : Contoh data pemesanan (Andri Santosa) tersimpan di SQLite
 * Author     : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi      : 1.0.0
 * Tanggal    : 2026-11-02
 */
class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $standar = RoomType::where('name', 'Standar')->first();

        if ($standar) {
            // Contoh data dari lembar soal BNSP:
            // Andri Santosa, NIK 3275091210770004, Laki-laki, Standar, 3 Hari, Breakfast Ya
            $calc = Booking::calculateTotal($standar->price, 3, true);

            Booking::updateOrCreate(
                ['booking_code' => 'BK-BNSP-001'],
                [
                    'customer_name' => 'Andri Santosa',
                    'gender' => 'Laki-laki',
                    'identity_number' => '3275091210770004',
                    'room_type_id' => $standar->id,
                    'room_price' => $standar->price,
                    'booking_date' => now()->toDateString(),
                    'stay_duration' => 3,
                    'include_breakfast' => true,
                    'breakfast_fee' => $calc['breakfast_fee'],
                    'discount_percentage' => $calc['discount_percentage'],
                    'discount_amount' => $calc['discount_amount'],
                    'total_payment' => $calc['total_payment'],
                ]
            );
        }
    }
}
