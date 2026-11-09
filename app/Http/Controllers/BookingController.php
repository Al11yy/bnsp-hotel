<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Menampilkan formulir pemesanan kamar hotel (create).
     */
    public function create(Request $request)
    {
        $roomTypes = RoomType::orderBy('price', 'asc')->get();
        $selectedRoomId = $request->query('room_id');

        return view('booking.create', compact('roomTypes', 'selectedRoomId'));
    }

    /**
     * Menyimpan transaksi pemesanan kamar hotel ke database SQLite (store).
     */
    public function store(Request $request)
    {
        // Validasi input form sesuai ketentuan standar sistem reservasi hotel
        $request->validate([
            'customer_name' => 'required|string|min:3|max:150',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'identity_number' => ['required', 'regex:/^[0-9]{16}$/'],
            'room_type_id' => 'required|exists:room_types,id',
            'booking_date' => 'required|date',
            'stay_duration' => 'required|integer|min:1',
            'include_breakfast' => 'nullable|boolean',
        ], [
            'customer_name.required' => 'Nama Pemesan wajib diisi.',
            'customer_name.min' => 'Nama Pemesan minimal 3 karakter.',
            'gender.required' => 'Pilih jenis kelamin (Laki-laki atau Perempuan).',
            'gender.in' => 'Pilihan jenis kelamin tidak valid.',
            'identity_number.required' => 'Nomor Identitas (NIK/KTP) wajib diisi.',
            'identity_number.regex' => 'Format nomor identitas tidak valid. Nomor identitas harus terdiri dari 16 digit angka.',
            'room_type_id.required' => 'Pilih tipe kamar yang ingin dipesan.',
            'room_type_id.exists' => 'Tipe kamar yang dipilih tidak terdaftar di sistem.',
            'booking_date.required' => 'Tanggal pesan wajib diisi.',
            'booking_date.date' => 'Format tanggal pesan tidak valid.',
            'stay_duration.required' => 'Durasi menginap harus diisi dengan angka (minimal 1 hari).',
            'stay_duration.integer' => 'Durasi menginap harus berupa angka (minimal 1 hari).',
            'stay_duration.min' => 'Durasi menginap minimal 1 hari.',
        ]);

        $roomType = RoomType::findOrFail($request->room_type_id);

        // Kalkulasi biaya sewa, diskon 10% jika menginap > 3 hari, dan sarapan (+Rp 80.000)
        $duration = (int) $request->stay_duration;
        $includeBreakfast = (bool) ($request->include_breakfast ?? false);
        $calc = Booking::calculateTotal($roomType->price, $duration, $includeBreakfast);

        // Generate kode pemesanan unik
        $bookingCode = 'BK-'.date('Ymd').'-'.strtoupper(Str::random(5));

        // Simpan data ke tabel bookings
        $booking = Booking::create([
            'booking_code' => $bookingCode,
            'customer_name' => trim($request->customer_name),
            'gender' => $request->gender,
            'identity_number' => $request->identity_number,
            'room_type_id' => $roomType->id,
            'room_price' => $roomType->price,
            'booking_date' => $request->booking_date,
            'stay_duration' => $duration,
            'include_breakfast' => $includeBreakfast,
            'breakfast_fee' => $calc['breakfast_fee'],
            'discount_percentage' => $calc['discount_percentage'],
            'discount_amount' => $calc['discount_amount'],
            'total_payment' => $calc['total_payment'],
        ]);

        return redirect()->route('booking.show', $booking)
            ->with('success', 'Pemesanan kamar hotel berhasil disimpan ke database!');
    }

    /**
     * Menampilkan bukti pemesanan / invoice voucher tamu (show).
     */
    public function show(Booking $booking)
    {
        $booking->load('roomType');

        return view('booking.show', compact('booking'));
    }

    /**
     * Menghapus transaksi pemesanan dari database (destroy).
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('booking.create')
            ->with('success', 'Data pemesanan berhasil dihapus.');
    }

    /**
     * API simulasi hitung total bayar kamar secara dinamis (AJAX / Fetch).
     */
    public function calculate(Request $request)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'stay_duration' => 'required|integer|min:1',
            'include_breakfast' => 'nullable|boolean',
        ]);

        $roomType = RoomType::findOrFail($request->room_type_id);
        $duration = (int) $request->stay_duration;
        $includeBreakfast = (bool) ($request->include_breakfast ?? false);
        $calc = Booking::calculateTotal($roomType->price, $duration, $includeBreakfast);

        return response()->json([
            'status' => 'success',
            'room_name' => $roomType->name,
            'room_price' => $roomType->price,
            'formatted_room_price' => 'Rp '.number_format($roomType->price, 0, ',', '.'),
            'data' => $calc,
            'formatted' => [
                'subtotal' => 'Rp '.number_format($calc['subtotal'], 0, ',', '.'),
                'discount_amount' => 'Rp '.number_format($calc['discount_amount'], 0, ',', '.'),
                'breakfast_fee' => 'Rp '.number_format($calc['breakfast_fee'], 0, ',', '.'),
                'total_payment' => 'Rp '.number_format($calc['total_payment'], 0, ',', '.'),
            ],
        ]);
    }
}
