<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model       : RoomType
 * Deskripsi   : Entitas data master tipe kamar hotel (Standar, Deluxe, Family)
 * Initial State : Akses database terdefinisi
 * Final State   : Model memiliki relasi ke Bookings, casting facilities (array), dan helper format harga
 * Author      : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi       : 1.0.0
 * Tanggal     : 2026-11-02
 */
class RoomType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'facilities',
        'capacity',
        'bed_type',
        'image_url',
        'video_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'facilities' => 'array',
            'price' => 'integer',
        ];
    }

    /**
     * Relasi ke data transaksi pemesanan
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Format harga kamar dalam Rupiah (Rp x.xxx.xxx)
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp '.number_format($this->price, 0, ',', '.');
    }

    /**
     * URL stream video kamar hotel dengan dukungan HTTP 206 Partial Content (Byte-Range)
     */
    public function getVideoStreamUrlAttribute(): string
    {
        $filename = basename($this->video_url ?? 'standar_tour.mp4');

        return route('video.stream', ['filename' => $filename]);
    }
}
