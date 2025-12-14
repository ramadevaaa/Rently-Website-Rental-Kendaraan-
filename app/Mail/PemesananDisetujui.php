<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pemesanan;

class PemesananDisetujui extends Mailable
{
    use Queueable, SerializesModels;

    public $pemesanan;
    public $adminContact;

    public function __construct(Pemesanan $pemesanan, $adminContact)
    {
        $this->pemesanan = $pemesanan;
        $this->adminContact = $adminContact;
    }

    public function build()
    {
        return $this->subject('Pemesanan Disetujui - RentLy')
                    ->view('emails.pemesanan-disetujui');
    }
}