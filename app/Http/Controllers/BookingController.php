<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Controller  : BookingController
 * Deskripsi   : Mengelola transaksi reservasi kamar hotel (Formulir, Kalkulasi, Penyimpanan, dan Invoice)
 * Initial State : Permintaan transaksi pemesanan dari pengguna
 * Final State   : Data transaksi tervalidasi, dihitung dengan benar, disimpan di SQLite, dan ditampilkan
 * Author      : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi       : 1.0.0
 * Tanggal     : 2026-11-02
 */
class BookingController extends Controller
{
    /**
     * Menampilkan daftar semua transaksi pemesanan yang tersimpan di database.
     */
    public function index(): View
    {
        $bookings = Booking::with('roomType')->latest()->paginate(10);

        return view('pages.booking-list', [
            'bookings' => $bookings,
            'title' => 'Daftar Riwayat Pemesanan - Hotel Grand Harmoni BNSP',
        ]);
    }

    /**
     * Menampilkan formulir pemesanan kamar hotel (Butir 2).
     */
    public function create(Request $request): View
    {
        $roomTypes = RoomType::orderBy('price', 'asc')->get();
        $selectedRoomId = $request->query('room_id');

        return view('pages.booking', [
            'roomTypes' => $roomTypes,
            'selectedRoomId' => $selectedRoomId,
            'title' => 'Form Pemesanan Kamar - Hotel Grand Harmoni BNSP',
        ]);
    }

    /**
     * Endpoint API JSON untuk kalkulasi simulasi biaya sewa (opsional untuk fetch/AJAX).
     */
    public function calculate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'stay_duration' => 'required|integer|min:1',
            'include_breakfast' => 'nullable|boolean',
        ]);

        $roomType = RoomType::findOrFail($validated['room_type_id']);
        $calculation = Booking::calculateTotal(
            $roomType->price,
            (int) $validated['stay_duration'],
            (bool) ($validated['include_breakfast'] ?? false)
        );

        return response()->json([
            'status' => 'success',
            'room_name' => $roomType->name,
            'room_price' => $roomType->price,
            'formatted_room_price' => 'Rp '.number_format($roomType->price, 0, ',', '.'),
            'data' => $calculation,
            'formatted' => [
                'subtotal' => 'Rp '.number_format($calculation['subtotal'], 0, ',', '.'),
                'discount_amount' => 'Rp '.number_format($calculation['discount_amount'], 0, ',', '.'),
                'breakfast_fee' => 'Rp '.number_format($calculation['breakfast_fee'], 0, ',', '.'),
                'total_payment' => 'Rp '.number_format($calculation['total_payment'], 0, ',', '.'),
            ],
        ]);
    }

    /**
     * Menyimpan data pemesanan kamar hotel ke database SQLite setelah divalidasi.
     */
    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $roomType = RoomType::findOrFail($validated['room_type_id']);

        // Kalkulasi ulang di server untuk integritas data (prinsip Senior Backend Security)
        $duration = (int) $validated['stay_duration'];
        $includeBreakfast = (bool) ($validated['include_breakfast'] ?? false);
        $calc = Booking::calculateTotal($roomType->price, $duration, $includeBreakfast);

        $booking = Booking::create([
            'booking_code' => 'BK-'.date('Ymd').'-'.strtoupper(Str::random(5)),
            'customer_name' => trim($validated['customer_name']),
            'gender' => $validated['gender'],
            'identity_number' => $validated['identity_number'],
            'room_type_id' => $roomType->id,
            'room_price' => $roomType->price,
            'booking_date' => $validated['booking_date'],
            'stay_duration' => $duration,
            'include_breakfast' => $includeBreakfast,
            'breakfast_fee' => $calc['breakfast_fee'],
            'discount_percentage' => $calc['discount_percentage'],
            'discount_amount' => $calc['discount_amount'],
            'total_payment' => $calc['total_payment'],
        ]);

        return redirect()->route('booking.show', $booking)->with([
            'success' => 'Pemesanan kamar hotel berhasil disimpan ke database!',
        ]);
    }

    /**
     * Menampilkan bukti pemesanan / invoice sesuai format lembar soal BNSP (halaman 3 butir b).
     */
    public function show(Booking $booking): View
    {
        $booking->load('roomType');

        return view('pages.booking-success', [
            'booking' => $booking,
            'title' => 'Bukti Pemesanan Kamar #'.$booking->booking_code.' - Hotel Grand Harmoni BNSP',
        ]);
    }
}
