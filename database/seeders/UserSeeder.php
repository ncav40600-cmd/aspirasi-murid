<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'full_name' => 'Admin User',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'nis' => '0000000000',
                'kelas' => 'XII IPA 1',
                'role' => 'admin',
                'email' => 'admin@example.com',
            ],
            [
                'full_name' => 'Siswa Satu',
                'username' => 'siswa1',
                'password' => Hash::make('password'),
                'nis' => '1234567891',
                'kelas' => 'XII IPA 1',
                'role' => 'siswa',
                'email' => 'siswa1@example.com',
            ],
            [
                'full_name' => 'Siswa Dua',
                'username' => 'siswa2',
                'password' => Hash::make('password'),
                'nis' => '1234567892',
                'kelas' => 'XII IPS 1',
                'role' => 'siswa',
                'email' => 'siswa2@example.com',
            ],
            [
                'full_name' => 'Siswa Tiga',
                'username' => 'siswa3',
                'password' => Hash::make('password'),
                'nis' => '1234567893',
                'kelas' => 'XI IPA 1',
                'role' => 'siswa',
                'email' => 'siswa3@example.com',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}