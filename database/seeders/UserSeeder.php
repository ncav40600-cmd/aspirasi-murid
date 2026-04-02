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
                'username' => 'admin',
                'password' => Hash::make('password'),
                'nis' => '0000000000',
                'kelas' => 'XII IPA 1',
                'role' => 'admin',
                'email' => 'admin@example.com',
                'full_name' => 'Admin User',
            ],
            [
                'username' => 'siswa1',
                'password' => Hash::make('password'),
                'nis' => '1234567891',
                'kelas' => 'XII IPA 1',
                'role' => 'siswa',
                'email' => 'siswa1@example.com',
                'full_name' => 'Siswa 1',
            ],
            [
                'username' => 'siswa2',
                'password' => Hash::make('password'),
                'nis' => '1234567892',
                'kelas' => 'XII IPA 1',
                'role' => 'siswa',
                'email' => 'siswa2@example.com',
                'full_name' => 'Siswa 2',
            ],
            [
                'username' => 'siswa3',
                'password' => Hash::make('password'),
                'nis' => '1234567893',
                'kelas' => 'XII IPA 1',
                'role' => 'siswa',
                'email' => 'siswa3@example.com',
                'full_name' => 'Siswa 3',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}