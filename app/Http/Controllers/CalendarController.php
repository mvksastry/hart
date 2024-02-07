<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//models
use App\Models\Event;
use App\Models\Eventype;

use App\Http\Requests\EventRequest;
//Traits
use App\Traits\Baseinfo;
use App\Traits\Eventhandler;

use Webpatser\Uuid\Uuid;

class CalendarController extends Controller
{
  use Baseinfo, Eventhandler;
  
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $events = $this->calendarEvents(); 	
    $eventypes = Eventype::all(); 
    $timespans = $this->timeSpanArray();

    if(request()->ajax()) 
    {
      $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
      $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
      
      return Response::json($data);
    }
      //return view('fullcalendar');
      $swalMsg = "page success";
      return view('calendar.myCalendar', compact('events','eventypes','timespans'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
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
      $input['conditions'] = "None";
      $input['comment'] = "None";
      
      $result = $this->setCalanderEvent($input);
      
      if($result) {
        echo "Event Recorded successfully";
      }
      else {
        echo "Event Recording Error";
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
