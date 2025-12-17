<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CloudCapacityReportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The candidate's name.
     *
     * @var string
     */
    public string $candidateName;

    /**
     * Create a new message instance.
     *
     * @param string $candidateName
     */
    public function __construct(string $candidateName)
    {
        $this->candidateName = $candidateName;
    }

    public function build(){

        return $this->subject('Report Data Cloud Capacity')
            ->html('Berikut terlampir file excel yang dibutuhkan. From ( ' . e($this->candidateName) . ' )');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cloud Capacity Report Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
