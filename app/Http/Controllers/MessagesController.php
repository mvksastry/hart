<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Employee;
//use App\Models\Messages;
use App\Models\User;
use Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

//Requests
use App\Http\Requests\MessagesRequest;

use Mail;
use Carbon\Carbon;
use App\Mail\ContactMail;
use App\Mail\OffAdminNotifyMail;
use App\Jobs\ContactEmailJob;
use App\Jobs\OffAdminEmailJob;
use App\Traits\Baseinfo;

use Illuminate\Support\Facades\Log;

class MessagesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //Get all users and pass it to the view 
    $msgs = Messages::with('employee')->latest('id')->take(5)->get();
    //dd($msgs);
    return view('messages.index', compact('msgs'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $users = User::with('employee')->latest('id')->take(5)->get();
    return view('messages.create', compact('users'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $input = $request->all();   

    //$clientIP = $request()->ip();  
    
    //$msgs = new Messages();
    //$msgs->name = $input['name'];
    //$msgs->email = $input['email'];
    //$msgs->message = $input['message'];  
    //$result = $msgs->save();
    //dd($result); 
    
    $contactMailData = [
      'name' => $input['name'],
      'email' => $input['email'],
      'product' => 'H A R T',
      'title' => 'Mail from HART-Meissa.in',
      'body'  => 'We thank you and acknowledge receipt of your mail 
                  regarding HART office by Meissa. We will get 
                  back to you soon with all the details requested.'
    ];
         
    $emailJob = (new ContactEmailJob($contactMailData))->delay(Carbon::now()->addMinutes(1));
    
    dispatch($emailJob);
    
    $dataAjax = [
      'success' => true,
      'message'=> 'Your Request processed',
    ];
    
    //now here implement mail to system admin people
    
    $sysAdminMailData = [
      'name' => "Krishna Teja",
      'email' => "tejak007@gmail.com",
      'product' => 'H A R T',
      'title' => 'Mail from '.$input['name'].' for HART',
      'body'  => 'Email received from '.$input['email'].' regarding HART office. 
                  The message is [ '.$input['message'].' ]'
    ];    
    
    $notifyEmailJob = (new OffADminEmailJob($sysAdminMailData))->delay(Carbon::now()->addMinutes(1));
    
    dispatch($notifyEmailJob);
    
    //now return the ajax response to web page to 
    //intimate the user that mail sent successfully
    return response()->json($dataAjax);  
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(MessagesRequest $request, $id)
  {
     
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
