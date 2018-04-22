<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'admin@highnox.com';
        $subject = 'New Invoice Generated';
        $name = 'HighNox';

        return $this->view('admin.emails.newInvoice')
                    ->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->attach($this->data['Path']);
    }
}