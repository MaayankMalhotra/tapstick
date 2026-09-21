<?php

namespace App\Mail;

use App\Models\PortfolioInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
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
        $rawName = trim($this->inquiry->name);
        $firstName = ($rawName && strcasecmp($rawName, 'Portfolio Visitor') !== 0)
            ? explode(' ', $rawName)[0]
            : 'there';

        return new Envelope(
            subject: "Thanks for reaching out, {$firstName}! · Maayank Malhotra (Resume Attached)",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.portfolio-user-confirmation',
        );
    }

    public function attachments(): array
    {
        $resumePath = public_path('resumes/Maayank_Malhotra_Resume.pdf');
        if (file_exists($resumePath)) {
            return [
                Attachment::fromPath($resumePath)
                    ->as('Maayank_Malhotra_Resume.pdf')
                    ->withMime('application/pdf'),
            ];
        }

        return [];
    }
}
