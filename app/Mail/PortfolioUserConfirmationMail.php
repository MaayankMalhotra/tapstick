<?php

namespace App\Mail;

use App\Models\PortfolioInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PortfolioUserConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public PortfolioInquiry $inquiry)
    {
    }

    public function envelope(): Envelope
    {
        $firstName = explode(' ', trim($this->inquiry->name))[0] ?: 'there';

        return new Envelope(
            subject: "Thanks for reaching out, {$firstName}! · Maayank Malhotra",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.portfolio-user-confirmation',
        );
    }
}
