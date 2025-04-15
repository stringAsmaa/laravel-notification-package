<?php

namespace Asmaa\Notification\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Asmaa\Notification\Mail\YourTestMail;

class SendTestMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $email;
    protected string $title;
    protected string $message;

    public function __construct(string $email, string $title, string $message)
    {
        $this->email = $email;
        $this->title = $title;
        $this->message = $message;
    }

    public function handle(): void
    {
        Mail::to($this->email)->send(
            new YourTestMail($this->title, $this->message)
        );
    }
}
