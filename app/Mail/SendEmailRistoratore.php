<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailRistoratore extends Mailable
{
    use Queueable, SerializesModels;

    protected $currentOrder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($currentOrder)
    {
        $this->currentOrder = $currentOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.ristoratore', ['currentOrder' => $this->currentOrder]);
    }
}
