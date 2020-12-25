<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Vacancy extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The data instance.
     *
     * @var data
     */
    public $data;

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

        return $this->from('noreply@'.$_SERVER['HTTP_HOST'])
            ->view('layouts.mail.vacancy')
            ->with([
                'param' => 123
            ]);
            /*
            ->attach('/path/to/file')
            ->attachData('anystring', 'name.pdf', [
                'mime' => 'application/pdf',
            ])
            ->with([
                'orderName' => $this->order->name,
                'orderPrice' => $this->order->price,
            ])
            ->text('layouts.mail')
            */
    }
}
