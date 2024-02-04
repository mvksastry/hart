<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

use Webpatser\Uuid\Uuid;

use App\Models\Event;
use App\Models\Eventype;

use App\Http\Requests\EventRequest;

use App\Traits\Baseinfo;
use App\Traits\Comments;
use App\Traits\Fileupload;
use App\Traits\Queries;
use App\Traits\Nexthop;
use App\Traits\Trail;
use App\Traits\Eventhandler;

class EventController extends Controller
{
	use Baseinfo, Comments, Fileupload, Queries, Nexthop, Trail, Eventhandler;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $events = [];
    if( Auth::user()->hasExactRoles(['employee','supervisor']) )
    {
      $events = Event::where('employee_id', Auth::user()->id)->get();
    }
    
    if( Auth::user()->hasExactRoles(['admin','employee']) )
    {
      $events = Event::with('user')->with('eventype')->get();
    }
    
    if( Auth::user()->hasExactRoles(['employee','director']) )
    {
      $events = Event::with('user')->with('eventype')->get();
    }
   
    return view('events.index', compact('events'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    if( Auth::user()->hasAnyRole(['employee','supervisor']) )
    {
      $eventypes = Eventype::all();
      $events = Event::all();
      return view('events.create', compact('eventypes','events'));
    }
    
    if( Auth::user()->hasAnyRole(['admin','director']) )
    {
      $eventypes = Eventype::all();
      $events = Event::all();
      return view('events.create', compact('eventypes','events'));
    }
    
    $message = "Required Permission Not Found";
    return redirect()->back()->withErrors(['errors'=>$message]);
  
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(EventRequest $request)
  {
    if(Auth::user()->hasExactRoles(['admin','director']))
    {
      $input = $request->validated();

      $result = $this->setEvent($input);
                  
      if(!$result )
      {
        return redirect()->back()->withErrors(['errors'=>'Event Exists at Same Time and Venue']);
      }
      else {
        return redirect()->route('events.index')
          ->with('flash_message',
              'New Event Registered successfully.');
      }
    }
    else {
      $message = "Required Permission Not Found";
      return redirect()->back()->withErrors(['message'=>'Event Exists at Same Time and Venue']);
    }
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
    if( Auth::user()->hasAnyPermission(['event_all','event_update', 'event_edit']))
    {
      $events = Event::with('eventype')->where('uuid', $id)->first();
      //dd($events);
      return view('events.edit', compact('events')); 
    }
    else {
      $message =  "Required Permission Not Found";
      return redirect()->back()->withErrors(['errors'=>$message]);
    }	
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(EventRequest $request, $id)
  {
      //
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
