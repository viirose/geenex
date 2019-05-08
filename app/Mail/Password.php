<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class Password extends Mailable
{
    use Queueable, SerializesModels;

    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        $info = $this->message;
        // $from => ['address' => Auth::user()->email, 'name' => Auth::user()->name];
        return $this
                // ->from(config('mail.from'))
                // ->to(config('mail.to'))
                ->subject('password for GENNEX')
                ->view('mails.password', compact('info'));
    }
}
