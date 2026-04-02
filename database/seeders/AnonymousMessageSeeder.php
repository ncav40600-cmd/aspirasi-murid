<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AnonymousMessage;
use App\Models\User;

class AnonymousMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'user_id' => User::where('username', 'siswa1')->first()->id,
                'message' => 'Saya ingin memberikan saran anonim tentang fasilitas sekolah.',
                'is_anonymous' => true,
            ],
            [
                'user_id' => User::where('username', 'siswa2')->first()->id,
                'message' => 'Terima kasih atas perbaikan yang telah dilakukan.',
                'is_anonymous' => false,
            ],
            [
                'user_id' => User::where('username', 'siswa3')->first()->id,
                'message' => 'Mohon perhatian lebih pada kebersihan lingkungan sekolah.',
                'is_anonymous' => true,
            ],
        ];

        foreach ($messages as $message) {
            AnonymousMessage::updateOrCreate(['message' => $message['message']], $message);
        }
    }
}