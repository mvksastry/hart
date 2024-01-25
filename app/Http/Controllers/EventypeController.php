<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Model\Role;
use Spatie\Permission\Model\Permission;
use Auth;
use App\Http\Requests\EventypeRequest;

//models
use App\Models\Eventype;

class EventypeController extends Controller
{
		
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//Get all users and pass it to the view
		$data['eventypes'] = Eventype::all(); 
		return view('eventypes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//
		$data['eventypes'] = Eventype::all();
		return view('eventypes.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventypeRequest $request)
    {
		//
		$eventype = new Eventype();

		$input = $request->validated();

		$input['posted_by'] = Auth::user()->name;
		$input['edited_by'] = "not done";

		$result = $eventype->fill($input)->save();

		return redirect()->route('eventypes.index')
						->with('flash_message',
						'Event Type successfully added.');
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
		$eventypes = Eventype::findOrFail($id); 
		//Get user with specified id			
		return view('eventypes.edit', compact('eventypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventypeRequest $request, $id)
    {
		$eventype = Eventype::findOrFail($id);
		
		$input = $request->validated();
			
		$input['posted_by'] = $eventype->posted_by;
		$input['edited_by'] = Auth::user()->name;

		$result = $eventype->fill($input)->save();
	
		return redirect()->route('eventypes.index')
											->with('flash_message',
								'Event Type successfully edited.');
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
