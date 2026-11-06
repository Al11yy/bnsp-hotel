<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration : CreateRoomTypesTable
 * Deskripsi : Membuat tabel master jenis kamar hotel (Standar, Deluxe, Family)
 * Initial State : Tabel room_types belum ada di skema database SQLite
 * Final State   : Tabel room_types terbentuk dengan kolom spesifikasi kamar & media
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
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->unsignedInteger('price');
            $table->text('description');
            $table->json('facilities')->nullable();
            $table->string('capacity')->default('2 Orang');
            $table->string('bed_type')->default('1 Queen Bed');
            $table->string('image_url');
            $table->string('video_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
