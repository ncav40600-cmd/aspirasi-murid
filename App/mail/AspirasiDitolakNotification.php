<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AspirasiDitolakNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $aspirasi;
    public $alasanTolak;

    public function __construct($aspirasi, $alasanTolak)
    {
        $this->aspirasi = $aspirasi;
        $this->alasanTolak = $alasanTolak;
    }

    public function build()
    {
        return $this->subject('❌ Aspirasi Ditolak - ' . ($this->aspirasi->nama_kategori ?? 'Laporan'))
                    ->view('emails.aspirasi-ditolak');
    }
}