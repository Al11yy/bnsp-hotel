<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model       : Booking
 * Deskripsi   : Entitas data transaksi pemesanan kamar hotel pengunjung
 * Initial State : Akses database terdefinisi
 * Final State   : Model memiliki relasi ke RoomType, casting data, helper kalkulasi, dan accessor format
 * Author      : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi       : 1.0.0
 * Tanggal     : 2026-11-02
 */
class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'booking_code',
        'customer_name',
        'gender',
        'identity_number',
        'room_type_id',
        'room_price',
        'booking_date',
        'stay_duration',
        'include_breakfast',
        'breakfast_fee',
        'discount_percentage',
        'discount_amount',
        'total_payment',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'room_price' => 'integer',
            'stay_duration' => 'integer',
            'include_breakfast' => 'boolean',
            'breakfast_fee' => 'integer',
            'discount_percentage' => 'integer',
            'discount_amount' => 'integer',
            'total_payment' => 'integer',
            'booking_date' => 'date',
        ];
    }

    /**
     * Relasi ke data master tipe kamar
     */
    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    /**
     * Format harga kamar dalam format Rupiah
     */
    public function getFormattedRoomPriceAttribute(): string
    {
        return 'Rp '.number_format($this->room_price, 0, ',', '.');
    }

    /**
     * Format potongan diskon dalam format Rupiah
     */
    public function getFormattedDiscountAmountAttribute(): string
    {
        return 'Rp '.number_format($this->discount_amount, 0, ',', '.');
    }

    /**
     * Format biaya sarapan dalam format Rupiah
     */
    public function getFormattedBreakfastFeeAttribute(): string
    {
        return 'Rp '.number_format($this->breakfast_fee, 0, ',', '.');
    }

    /**
     * Format total bayar dalam format Rupiah
     */
    public function getFormattedTotalPaymentAttribute(): string
    {
        return 'Rp '.number_format($this->total_payment, 0, ',', '.');
    }

    /**
     * Format tanggal pesan (dd/mm/yyyy)
     */
    public function getFormattedBookingDateAttribute(): string
    {
        return $this->booking_date ? $this->booking_date->format('d/m/Y') : '-';
    }

    /**
     * Hitung kalkulasi pemesanan berdasarkan aturan hotel:
     * - Subtotal = harga_kamar * durasi
     * - Jika durasi > 3 hari => diskon 10%
     * - Jika sarapan dipilih => tambahan Rp 80.000 per hari (80.000 * durasi)
     *
     * @return array{
     *     subtotal: int,
     *     discount_percentage: int,
     *     discount_amount: int,
     *     breakfast_fee: int,
     *     total_payment: int
     * }
     */
    public static function calculateTotal(int $roomPrice, int $duration, bool $includeBreakfast): array
    {
        $subtotal = $roomPrice * $duration;
        $discountPercentage = ($duration > 3) ? 10 : 0;
        $discountAmount = (int) round(($discountPercentage / 100) * $subtotal);
        $breakfastFee = $includeBreakfast ? (80000 * $duration) : 0;
        $totalPayment = ($subtotal - $discountAmount) + $breakfastFee;

        return [
            'subtotal' => $subtotal,
            'discount_percentage' => $discountPercentage,
            'discount_amount' => $discountAmount,
            'breakfast_fee' => $breakfastFee,
            'total_payment' => $totalPayment,
        ];
    }
}
