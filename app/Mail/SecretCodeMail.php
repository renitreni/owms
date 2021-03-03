<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SecretCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->candidate = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->html("<p>Hi {$this->candidate->first_name},</p>
                    <p><br></p>
                    <p>This is your Secret Code&nbsp;{$this->candidate->code}</p>
                    <p>Please keep this a secret from anyone.</p>
                    <p><br></p>
                    <p>Thank you,<br>" . auth()->user()->email . "</p>"
        )
                    ->bcc(['renier.trenuela@gmail.com'])
                    ->from(auth()->user()->email);
    }
}
