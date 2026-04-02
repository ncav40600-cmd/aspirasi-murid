<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aspirasi;
use App\Models\User;

class AspirasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aspirasis = [
            [
                'user_id' => User::where('username', 'siswa1')->first()->id,
                'email_siswa' => 'siswa1@example.com',
                'id_kategori' => 1, // Fasilitas
                'keterangan' => 'Kelas perlu diperbaiki karena ada meja yang rusak.',
                'foto' => null,
                'lokasi' => 'Kelas XII IPA 1',
                'status' => 'pending',
                'umpan_balik' => null,
                'is_anonymous' => false,
            ],
            [
                'user_id' => User::where('username', 'siswa2')->first()->id,
                'email_siswa' => 'siswa2@example.com',
                'id_kategori' => 2, // Kurikulum
                'keterangan' => 'Materi matematika terlalu sulit, mohon tambahkan penjelasan lebih lanjut.',
                'foto' => null,
                'lokasi' => 'Ruang Kelas',
                'status' => 'in_progress',
                'umpan_balik' => 'Sedang ditinjau oleh tim kurikulum.',
                'is_anonymous' => false,
            ],
            [
                'user_id' => User::where('username', 'siswa3')->first()->id,
                'email_siswa' => 'siswa3@example.com',
                'id_kategori' => 3, // Ekstrakurikuler
                'keterangan' => 'Perlu tambah kegiatan olahraga setelah sekolah.',
                'foto' => null,
                'lokasi' => 'Lapangan sekolah',
                'status' => 'completed',
                'umpan_balik' => 'Akan dijadwalkan kegiatan olahraga mingguan.',
                'is_anonymous' => true,
            ],
            [
                'user_id' => User::where('username', 'siswa1')->first()->id,
                'email_siswa' => 'siswa1@example.com',
                'id_kategori' => 4, // Lainnya
                'keterangan' => 'Kantin sekolah perlu lebih bersih.',
                'foto' => null,
                'lokasi' => 'Kantin',
                'status' => 'pending',
                'umpan_balik' => null,
                'is_anonymous' => false,
            ],
        ];

        foreach ($aspirasis as $aspirasi) {
            Aspirasi::create($aspirasi);
        }
    }
}