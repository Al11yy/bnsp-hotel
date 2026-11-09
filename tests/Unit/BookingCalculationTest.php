<?php

namespace Tests\Unit;

use App\Models\Booking;
use PHPUnit\Framework\TestCase;

/**
 * Unit Test   : BookingCalculationTest
 * Deskripsi   : Menguji algoritma perhitungan harga, diskon 10% (> 3 hari), dan biaya breakfast
 * Author      : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi       : 1.0.0
 * Tanggal     : 2026-11-02
 */
class BookingCalculationTest extends TestCase
{
    /**
     * Uji kasus 1: Menginap 1 hari tanpa breakfast (Tidak dapat diskon).
     */
    public function test_calculate_one_day_without_breakfast(): void
    {
        $result = Booking::calculateTotal(500000, 1, false);

        $this->assertEquals(500000, $result['subtotal']);
        $this->assertEquals(0, $result['discount_percentage']);
        $this->assertEquals(0, $result['discount_amount']);
        $this->assertEquals(0, $result['breakfast_fee']);
        $this->assertEquals(500000, $result['total_payment']);
    }

    /**
     * Uji kasus 2: Menginap 3 hari tanpa breakfast (Tepat 3 hari = Tidak dapat diskon karena syarat > 3 hari).
     */
    public function test_calculate_three_days_without_breakfast(): void
    {
        $result = Booking::calculateTotal(500000, 3, false);

        $this->assertEquals(1500000, $result['subtotal']);
        $this->assertEquals(0, $result['discount_percentage']);
        $this->assertEquals(0, $result['discount_amount']);
        $this->assertEquals(0, $result['breakfast_fee']);
        $this->assertEquals(1500000, $result['total_payment']);
    }

    /**
     * Uji kasus 3: Menginap 3 hari DENGAN breakfast (Rp 80.000 x 3 hari = Rp 240.000).
     */
    public function test_calculate_three_days_with_breakfast(): void
    {
        $result = Booking::calculateTotal(500000, 3, true);

        $this->assertEquals(1500000, $result['subtotal']);
        $this->assertEquals(0, $result['discount_percentage']);
        $this->assertEquals(0, $result['discount_amount']);
        $this->assertEquals(240000, $result['breakfast_fee']);
        $this->assertEquals(1740000, $result['total_payment']);
    }

    /**
     * Uji kasus 4: Menginap 4 hari (Lebih dari 3 hari => Dapat diskon 10%) tanpa breakfast.
     * Subtotal: 4 * 500.000 = 2.000.000
     * Diskon 10%: 200.000
     * Total Bayar: 1.800.000
     */
    public function test_calculate_four_days_with_discount(): void
    {
        $result = Booking::calculateTotal(500000, 4, false);

        $this->assertEquals(2000000, $result['subtotal']);
        $this->assertEquals(10, $result['discount_percentage']);
        $this->assertEquals(200000, $result['discount_amount']);
        $this->assertEquals(0, $result['breakfast_fee']);
        $this->assertEquals(1800000, $result['total_payment']);
    }

    /**
     * Uji kasus 5: Menginap 5 hari Deluxe (800.000) DENGAN breakfast (80.000 x 5 = 400.000).
     * Subtotal: 5 * 800.000 = 4.000.000
     * Diskon 10%: 400.000
     * Total Kamar setelah diskon: 3.600.000
     * Breakfast: + 400.000 (80.000 * 5)
     * Total Bayar: 4.000.000
     */
    public function test_calculate_deluxe_five_days_with_discount_and_breakfast(): void
    {
        $result = Booking::calculateTotal(800000, 5, true);

        $this->assertEquals(4000000, $result['subtotal']);
        $this->assertEquals(10, $result['discount_percentage']);
        $this->assertEquals(400000, $result['discount_amount']);
        $this->assertEquals(400000, $result['breakfast_fee']);
        $this->assertEquals(4000000, $result['total_payment']);
    }

    /**
     * Uji kasus 6: Menginap 4 hari Standar (500.000) DENGAN breakfast (80.000 x 4 = 320.000).
     * Subtotal: 4 * 500.000 = 2.000.000
     * Diskon 10%: 200.000
     * Breakfast: 80.000 * 4 = 320.000
     * Total Bayar: (2.000.000 - 200.000) + 320.000 = 2.120.000
     */
    public function test_calculate_four_days_with_breakfast_calculated_per_day(): void
    {
        $result = Booking::calculateTotal(500000, 4, true);

        $this->assertEquals(2000000, $result['subtotal']);
        $this->assertEquals(10, $result['discount_percentage']);
        $this->assertEquals(200000, $result['discount_amount']);
        $this->assertEquals(320000, $result['breakfast_fee']);
        $this->assertEquals(2120000, $result['total_payment']);
    }
}
