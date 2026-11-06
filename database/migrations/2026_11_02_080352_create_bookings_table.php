<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration : CreateBookingsTable
 * Deskripsi : Membuat tabel transaksi pemesanan kamar hotel pengunjung
 * Initial State : Tabel bookings belum ada di skema database SQLite
 * Final State   : Tabel bookings terbentuk dengan relasi ke tabel room_types
 * Author        : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi         : 1.0.0
 * Tanggal       : 2026-11-02
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->unique();
            $table->string('customer_name');
            $table->string('gender', 20); // Laki-laki / Perempuan
            $table->string('identity_number', 16); // 16 digit NIK
            $table->foreignId('room_type_id')->constrained('room_types')->cascadeOnDelete();
            $table->unsignedInteger('room_price'); // Harga kamar per malam saat dipesan
            $table->date('booking_date'); // Tanggal menginap
            $table->unsignedInteger('stay_duration'); // Durasi menginap (hari)
            $table->boolean('include_breakfast')->default(false); // Checkbox breakfast
            $table->unsignedInteger('breakfast_fee')->default(0); // Biaya sarapan (80.000 jika dipilih)
            $table->unsignedTinyInteger('discount_percentage')->default(0); // 10% jika > 3 hari, 0% jika <= 3
            $table->unsignedInteger('discount_amount')->default(0); // Nilai nominal potongan diskon
            $table->unsignedInteger('total_payment'); // Total akhir setelah diskon & sarapan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
