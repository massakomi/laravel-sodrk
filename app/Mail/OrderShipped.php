<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 

        return $this->from('example@example.com')
            ->view('layouts.mail')
            /*->attach('/path/to/file')
            ->attachData('anystring', 'name.pdf', [
                'mime' => 'application/pdf',
            ]);*/
            ->text('layouts.mail');
    }
}
