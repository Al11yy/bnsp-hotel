<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

/**
 * Seeder     : RoomTypeSeeder
 * Deskripsi  : Mengisi data awal master tipe kamar hotel bergaya arsitektur editorial (Standar, Deluxe, Family)
 * Initial State : Tabel room_types kosong atau belum memiliki data awal
 * Final State   : 3 jenis kamar tersimpan di database SQLite beserta spesifikasi & media
 * Author     : Peserta Sertifikasi BNSP - Junior Web Developer
 * Versi      : 2.0.0 (Editorial Luxury Redesign)
 * Tanggal    : 2026-11-03
 */
class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            [
                'name' => 'Standar',
                'slug' => 'standar',
                'price' => 500000,
                'capacity' => '2 Orang Dewasa',
                'bed_type' => '1 Queen Bed (160x200 cm)',
                'image_url' => '/assets/images/rooms/standar.jpg',
                'video_url' => '/assets/videos/rooms/standar_tour.mp4',
                'description' => 'Ruang peristirahatan minimalis dengan material kejujuran kayu oak mentah, plester pasir bertekstur hangat, dan pencahayaan alami yang menenangkan.',
                'facilities' => [
                    'Air Conditioning Silent Inverter',
                    'High-Speed Fiber Wi-Fi (50 Mbps)',
                    'Smart TV 32 Inch dengan Saluran Terpilih',
                    'Meja Kerja Kayu Solid & Kursi Linen',
                    'Artisan Mineral Water Harian',
                    'Walk-in Rain Shower & Air Panas Alami',
                    'Organic Botanical Bathroom Amenities',
                ],
            ],
            [
                'name' => 'Deluxe',
                'slug' => 'deluxe',
                'price' => 800000,
                'capacity' => '2-3 Orang Dewasa',
                'bed_type' => '1 King Bed Premium (180x200 cm)',
                'image_url' => '/assets/images/rooms/deluxe.jpg',
                'video_url' => '/assets/videos/rooms/deluxe_tour.mp4',
                'description' => 'Sanctuary mewah berbalut dinding lengkung travertine dan teras pribadi menghadap lanskap terbuka, dilengkapi sofa boucle dan bak rendam marmer.',
                'facilities' => [
                    'Climate Control Daikin Silent Unit',
                    'Smart TV 43 Inch (Netflix & Apple TV Ready)',
                    'Artisanal Bar & Kulkas Pendingin Minuman',
                    'Bathtub Marmer Bebas & Double Rain Shower',
                    'Manual Pour-Over Coffee & Herbal Tea Station',
                    'Balkon Terbuka Bernuansa Arsitektur Brutalis',
                    'Sofa Boucle & Travertine Monolith Table',
                    'Private In-Room Digital Safe Box',
                ],
            ],
            [
                'name' => 'Family',
                'slug' => 'family',
                'price' => 1200000,
                'capacity' => '4-5 Orang (Keluarga)',
                'bed_type' => '2 Queen Bed Luas (160x200 cm)',
                'image_url' => '/assets/images/rooms/family.jpg',
                'video_url' => '/assets/videos/rooms/family_tour.mp4',
                'description' => 'Residence keluarga dua kamar dengan balok kayu ekspos di langit-langit tinggi, ruang berkumpul lapang, serta privasi eksklusif untuk kebersamaan.',
                'facilities' => [
                    '2 Queen Bed dengan Linen Katun Mesir 600 TC',
                    'Smart TV 55 Inch di Living Lounge & 43 Inch di Kamar',
                    'Ruang Tamu & Ruang Duduk Terpisah dengan Pintu Geser Kayu',
                    'Pantry Keluarga, Kulkas 2 Pintu & Oven Penghangat',
                    'Kamar Mandi Jacuzzi Pribadi & Double Stone Vanity',
                    'Lemari Wardrobe Kayu Jati Terbuka & Meja Rias',
                    'Air Purifier Penjernih Udara Berstandar Medis',
                    'Akses Langsung ke Kolam Renang Air Hangat',
                ],
            ],
        ];

        foreach ($roomTypes as $data) {
            RoomType::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}
