<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SurveysFormSubmitMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $receiver_name;
    public $receiver_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiver_name, $receiver_email)
    {
        $this->receiver_name = $receiver_name;
        $this->receiver_email = $receiver_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.surveysmailer');
    }
}
