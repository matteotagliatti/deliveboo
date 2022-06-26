<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailGuest extends Mailable
{
    use Queueable, SerializesModels;

    protected $currentOrder;
    protected $restaurant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($currentOrder, $restaurant)
    {
        $this->currentOrder = $currentOrder;
        $this->restaurant = $restaurant;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.guest', ['currentOrder' => $this->currentOrder, 'restaurant' => $this->restaurant]);
    }
}
