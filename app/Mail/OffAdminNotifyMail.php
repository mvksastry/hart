<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;

class OffAdminNotifyMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $sysAdminMailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sysAdminMailData)
    {
        //
        $this->sysAdminMailData = $sysAdminMailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mailers.Welcome.offAdminNewMail');
    }
}
