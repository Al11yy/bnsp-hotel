<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Form Request : StoreBookingRequest
 * Deskripsi    : Validasi input data pemesanan kamar hotel dari pengguna
 * Initial State  : Data HTTP POST masuk dari formulir pemesanan
 * Final State    : Data terverifikasi sesuai aturan BNSP atau melempar pesan galat spesifik
 * Author       : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi        : 1.0.0
 * Tanggal      : 2026-11-02
 */
class StoreBookingRequest extends FormRequest
{
    /**
     * Tentukan otorisasi pengguna untuk request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi sesuai lembar tugas BNSP FR.IA.02.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => ['required', 'string', 'min:3', 'max:150'],
            'gender' => ['required', 'in:Laki-laki,Perempuan'],
            'identity_number' => ['required', 'regex:/^[0-9]{16}$/'],
            'room_type_id' => ['required', 'exists:room_types,id'],
            'booking_date' => ['required', 'date'],
            'stay_duration' => ['required', 'integer', 'min:1'],
            'include_breakfast' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Kustomisasi pesan validasi spesifik sesuai petunjuk BNSP.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'customer_name.required' => 'Nama Pemesan wajib diisi.',
            'customer_name.min' => 'Nama Pemesan minimal 3 karakter.',
            'gender.required' => 'Pilih jenis kelamin (Laki-laki atau Perempuan).',
            'gender.in' => 'Pilihan jenis kelamin tidak valid.',
            'identity_number.required' => 'Nomor Identitas wajib diisi.',
            'identity_number.regex' => 'isian salah..data harus 16 digit',
            'room_type_id.required' => 'Pilih tipe kamar yang ingin dipesan.',
            'room_type_id.exists' => 'Tipe kamar yang dipilih tidak terdaftar di sistem.',
            'booking_date.required' => 'Tanggal pesan wajib diisi.',
            'booking_date.date' => 'Format tanggal pesan tidak valid.',
            'stay_duration.required' => 'harus isi angka',
            'stay_duration.integer' => 'harus isi angka',
            'stay_duration.min' => 'harus isi angka (minimal 1 hari)',
        ];
    }

    /**
     * Normalisasi input sebelum validasi dijalankan.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'include_breakfast' => $this->boolean('include_breakfast'),
        ]);
    }
}
