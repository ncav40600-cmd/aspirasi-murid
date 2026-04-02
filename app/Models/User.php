<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'full_name', 'username', 'password', 'nis', 'kelas', 'role', 'email'
    ];

    // Relasi: User punya banyak aspirasi
    public function aspirasi()
    {
        return $this->hasMany(Aspirasi::class, 'user_id', 'id');
    }
}