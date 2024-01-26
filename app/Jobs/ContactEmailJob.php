<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\ContactMail;
use Mail;

class ContactEmailJob implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  
  protected $contactMailData;
  
  public $tries = 2;
  
  public $timeout = 600;
    
  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct($contactMailData)
  {
    $this->contactMailData = $contactMailData;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    
    $contEmail = new ContactMail($this->contactMailData);
    
    Mail::to($this->contactMailData['email'])->send($contEmail);
    
    if (Mail::flushMacros()) 
    {
      Log::channel('contactmail')->info('Ack Mail to [ '.$this->contactMailData['email'].' ] Failed');
    } else {
      Log::channel('contactmail')->info('Ack Mail to [ '.$this->contactMailData['email'].' ] Successful');
    }
    
  }
}
