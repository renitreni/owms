<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyOfContractStatus extends Mailable
{
    use Queueable, SerializesModels;

    protected $serial_no;

    protected $remarks;

    protected $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($serial_no, $remarks, $status)
    {
        $this->serial_no = $serial_no;
        $this->remarks   = $remarks;
        $this->status    = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('CONTRACT NOTIFICATION - Tabang System')
                    ->view('printables.contract-status', [
                        'serial_no' => $this->serial_no,
                        'remarks'   => $this->remarks,
                        'status'    => $this->status,
                    ]);
    }
}
