<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlertaStockMail extends Mailable
{
    use Queueable, SerializesModels;

    public $material;

    public function __construct($material)
    {
        $this->material = $material;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
           
            subject: ' Alerta d\'Estoc: Queda poc material!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.alerta_stock', 
        );
    }
    public function attachments(): array
    {
        return [];
    }
}