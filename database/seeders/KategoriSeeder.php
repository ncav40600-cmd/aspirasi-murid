<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            ['keterangan' => 'Fasilitas'],
            ['keterangan' => 'Kurikulum'],
            ['keterangan' => 'Ekstrakurikuler'],
            ['keterangan' => 'Lainnya'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::updateOrCreate(['keterangan' => $kategori['keterangan']], $kategori);
        }
    }
}