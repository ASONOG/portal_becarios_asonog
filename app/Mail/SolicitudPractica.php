<?php

namespace App\Mail;

use App\Models\InternshipApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitudPractica extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly InternshipApplication $application,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [$this->application->email],
            subject: "[Prácticas] Nueva solicitud de {$this->application->full_name}",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.solicitud-practica',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
