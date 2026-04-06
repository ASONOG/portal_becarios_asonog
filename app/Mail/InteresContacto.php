<?php

namespace App\Mail;

use App\Models\InterestDonation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InteresContacto extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly InterestDonation $interest,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [$this->interest->email],
            subject: "[Donación] Interés de {$this->interest->name}",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.interes-contacto',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
