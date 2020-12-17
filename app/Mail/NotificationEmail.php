<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$button,$url)
    {
        $this->url = $url;
        $this->body = $body;
        $this->button = $button;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.NotificationEMail')->with([
            'body'=>$this->body,
            'button' => $this->button,
            'url' => $this->url,
            
            
        ]);;
    }
}
