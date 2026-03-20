<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DonacionInteres extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly array $data,
    ) {}

    public function envelope(): Envelope
    {
        $amount = '$' . number_format((float) ($this->data['amount'] ?? 0), 2);
        $name = $this->data['donor_name'] ?: 'Anónimo';

        return new Envelope(
            subject: "[Donación] Pago completado - {$amount} USD de {$name}",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.donacion-interes',
            with: ['data' => $this->data],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
