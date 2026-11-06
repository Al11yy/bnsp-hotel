<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Seeder     : DatabaseSeeder
 * Deskripsi  : Master runner seeder aplikasi hotel BNSP
 * Author     : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi      : 1.0.0
 * Tanggal    : 2026-11-02
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoomTypeSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
