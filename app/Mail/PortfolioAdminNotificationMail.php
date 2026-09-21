<?php

namespace App\Mail;

use App\Models\PortfolioInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PortfolioAdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public PortfolioInquiry $inquiry)
    {
    }

    public function envelope(): Envelope
    {
        $subjectText = $this->inquiry->subject ? " · {$this->inquiry->subject}" : '';

        return new Envelope(
            subject: "🚀 New Portfolio Inquiry: {$this->inquiry->name}{$subjectText}",
            replyTo: [$this->inquiry->email],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.portfolio-admin-notification',
        );
    }
}
