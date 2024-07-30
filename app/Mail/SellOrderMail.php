<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SellOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private $order, private $sell_rate)
    {
        $this->order = $order;
        $this->buy_rate = $sell_rate;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sell Order Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.sell-order-mail',
            with: [
                'firstname' => $this->order->user->firstname,
                'amount' => $this->order->amount,
                'reference' => $this->order->trx_hash,
                'cryptoAmount' => $this->order->amount / $this->sell_rate,
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
