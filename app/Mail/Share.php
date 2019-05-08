<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Share extends Mailable
{
    use Queueable, SerializesModels;

    private $info;

    /**
     * Create a new info instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        $this->info = $info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        $info = $this->info;
        // $from => ['address' => Auth::user()->email, 'name' => Auth::user()->name];
        return $this
                // ->from(config('mail.from'))
                // ->to(config('mail.to'))
                ->subject('GENNEX: '.$info['part_no'])
                ->view('mails.share', compact('info'));
    }
}
