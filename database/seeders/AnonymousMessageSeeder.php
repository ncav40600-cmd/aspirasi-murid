<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AnonymousMessage;

class AnonymousMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'user_id' => 2, // siswa1
                'message' => 'Saya ingin memberikan saran anonim tentang fasilitas sekolah.',
                'is_anonymous' => true,
            ],
            [
                'user_id' => 3, // siswa2
                'message' => 'Terima kasih atas perbaikan yang telah dilakukan.',
                'is_anonymous' => false,
            ],
            [
                'user_id' => 4, // siswa3
                'message' => 'Mohon perhatian lebih pada kebersihan lingkungan sekolah.',
                'is_anonymous' => true,
            ],
        ];

        foreach ($messages as $message) {
            AnonymousMessage::create($message);
        }
    }
}