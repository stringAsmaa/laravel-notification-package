<?php

namespace Asmaa\Notification\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class YourTestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $mailMessage;

    public function __construct($title, $mailMessage)
    {
        $this->title = $title;
        $this->mailMessage = $mailMessage;
    }


    public function build()
    {
        return $this->subject($this->title)
                    ->view('notification::emails.test');
    }
}
