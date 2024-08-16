<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CryptoOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private $order, private $type, private $buy_rate, private $sell_rate)
    {
        $this->order = $order;
        $this->type = $type;
        $this->buy_rate = $buy_rate;
        $this->sell_rate = $sell_rate;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Crypto Order Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.admin.crypto-order-mail',
            with: [
                'firstname' => $this->order->user->firstname,
                'amount' => $this->order->amount,
                'type' => $this->type,
                'reference' => $this->order->trx_hash,
                'cryptoAmount' => $this->order->amount / $this->buy_rate,
                'cryptocurrency' => $this->order->cryptocurrency->name,
                'date_of_order' => $this->order->created_at
            ],
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
