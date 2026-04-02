<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $table = 'aspirasi';
    protected $primaryKey = 'id_aspirasi';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'email_siswa', // ✅ WAJIB ADA
        'id_kategori',
        'keterangan',
        'foto',
        'lokasi',
        'status',
        'umpan_balik',
        'is_anonymous'
    ];

    // ✅ PERBAIKI RELASI INI (KUNCI UTAMA!)
    public function user()
    {
        // user_id di tabel aspirasi → id di tabel users
        return $this->belongsTo(User::class, 'user_id', 'id'); // ✅ BENAR!
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}