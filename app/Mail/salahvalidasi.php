<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class salahvalidasi extends Mailable
{
    use Queueable, SerializesModels;

    public $salahvalidasi;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($salahvalidasi)
    {
        $this->salahvalidasi = $salahvalidasi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user-email-salah')->subject('Validasi Tidak Diterima');
    }
}
