<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SellGiftCardMail extends Mailable
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
            subject: 'Sell Gift Card Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.sell-gift-card-mail',
            with: [
                'firstname' => $this->order->user->firstname,
                'amount' => $this->order->amount,
                'reference' => $this->order->trx_hash,
                'giftcardValue' => $this->order->amount / $this->sell_rate,
                'giftcard' => $this->order->giftcard->name,
                'currency' => $this->order->currency->name,
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
