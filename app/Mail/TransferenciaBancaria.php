<?php

namespace App\Mail;

use App\Models\BankTransferDonation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TransferenciaBancaria extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly BankTransferDonation $donation,
    ) {}

    public function envelope(): Envelope
    {
        $amount = 'L ' . number_format((float) $this->donation->amount, 2);

        return new Envelope(
            subject: "[Transferencia] Nueva confirmación - {$amount} de {$this->donation->donor_name}",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.transferencia-bancaria',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
