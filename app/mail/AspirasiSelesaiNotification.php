<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AspirasiSelesaiNotification extends Mailable
{
    use Queueable, SerializesModels;

    // Properti harus PUBLIC agar terbaca otomatis oleh Blade
    public $aspirasi;
    public $umpanBalik;

    public function __construct($aspirasi, $umpanBalik = null)
    {
        $this->aspirasi = $aspirasi;
        $this->umpanBalik = $umpanBalik;
    }

    public function build()
    {
        return $this->subject('✅ Aspirasi Selesai - ' . ($this->aspirasi->nama_kategori ?? 'Laporan'))
                    ->view('emails.aspirasi-selesai');
    }
}
