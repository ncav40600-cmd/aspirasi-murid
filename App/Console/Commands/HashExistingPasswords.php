<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HashExistingPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hash-existing-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hash existing plaintext passwords in the users table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        $count = 0;

        foreach ($users as $user) {
            // Check if password is already hashed (bcrypt starts with $2y$)
            if (!str_starts_with($user->password, '$2y$')) {
                $user->password = Hash::make($user->password);
                $user->save();
                $count++;
                $this->info("Hashed password for user: {$user->username}");
            }
        }

        $this->info("Total passwords hashed: {$count}");
    }
}
