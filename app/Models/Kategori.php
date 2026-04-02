<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    // 🔥 Custom Primary Key
    protected $primaryKey = 'id_kategori';

    // 🔥 Penting: kasih tahu kalau ini bukan auto increment default (optional tapi aman)
    public $incrementing = true;

    // 🔥 Tipe primary key (default int, tapi kita tegasin)
    protected $keyType = 'int';

    // 🔥 Tidak pakai timestamps
    public $timestamps = false;

    // 🔥 Field yang boleh diisi
    protected $fillable = ['keterangan'];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    // Relasi: Kategori punya banyak aspirasi
    public function aspirasi()
    {
        return $this->hasMany(Aspirasi::class, 'id_kategori', 'id_kategori');
    }

    /*
    |--------------------------------------------------------------------------
    | OPTIONAL (BIAR LEBIH ENAK DIPAKAI)
    |--------------------------------------------------------------------------
    */

    // 🔥 Alias biar bisa pakai $kategori->id (biar kayak Laravel default)
    public function getIdAttribute()
    {
        return $this->attributes['id_kategori'];
    }
}