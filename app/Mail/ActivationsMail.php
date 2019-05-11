<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivationsMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->data['name'];
        $activation_code = $this->data['activation_code'];
        $password = $this->data['password'];
        \Log::info("====SENDING EMAILS=====");
        return $this->view('emails.activasi')
                    ->with([
                        'name' => $name,
                        'activation_code' => $activation_code,
                        'password'  => $password
                    ]);
    }           
}
