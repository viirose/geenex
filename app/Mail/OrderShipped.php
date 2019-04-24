<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Auth;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * 订单实例.
     *
     * @var Order
     */
    protected $request;

    /**
     * 创建一个新的实例.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $form = $this->request;
        // $from => ['address' => Auth::user()->email, 'name' => Auth::user()->name];
        return $this
                // ->from(config('mail.from'))
                // ->to(config('mail.to'))
                ->view('mails.inquiries', compact('form'));
    }
}
