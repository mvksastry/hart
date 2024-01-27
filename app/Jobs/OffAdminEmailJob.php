<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\OffAdminNotifyMail;
use Mail;

use Illuminate\Support\Facades\Log;

class OffAdminEmailJob implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected $sysAdminMailData;
  
  public $tries = 2;
  
  public $timeout = 600;
  
  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct($sysAdminMailData)
  {
      //
      $this->sysAdminMailData = $sysAdminMailData;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    //
    $notifyEmail = new OffAdminNotifyMail($this->sysAdminMailData);

    Mail::to($this->sysAdminMailData['email'])->send($notifyEmail);
    
    if (Mail::flushMacros()) 
    {
      Log::channel('contactmail')->info('Ack Mail to [ '.$this->sysAdminMailData['email'].' ] Failed');
    } else {
      Log::channel('contactmail')->info('Ack Mail to [ '.$this->sysAdminMailData['email'].' ] Successful');
    }
  }
}
