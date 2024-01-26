<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;

class ContactMail extends Mailable
{
  use Queueable, SerializesModels;
    
  public $contactMailData;
  
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($contactMailData)
  {
    $this->contactMailData = $contactMailData;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->view('mailers.Welcome.welcome');
  }
  
  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
    return new Envelope(
        from: new Address('meissa-service@meissahart.in'),
        replyTo: [
          new Address('mvksastry@gmail.com', 'Krishna Sastry'),
        ],
        subject: 'HART Mail',
    );
  }
  
  /**
   * Get the message content definition.
   */
  public function content(): Content
  {
      return new Content(
          view: 'mailers.contactMailer',
      );
  }
  
  /**
   * Get the attachments for the message.
   *
   * @return array

   */
  public function attachments(): array
  {
      //Attachment::fromPath('/path/to/file')
      //          ->as('name.pdf')
      //          ->withMime('application/pdf'),
  }
}
