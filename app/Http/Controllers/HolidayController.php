<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Model\Role;
use Spatie\Permission\Model\Permission;
use Auth;
use App\Http\Requests\HolidayRequest;
use App\Models\Holiday;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//
		//Get all users and pass it to the view
		$data['holidays'] = Holiday::all(); 
		return view('holidays.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//
		$data['holidays'] = Holiday::all();
		return view('holidays.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HolidayRequest $request)
    {
        //
		$holiday = new Holiday();
		
		$input = $request->validated();
		$input['posted_by'] = Auth::user()->name;
		$input['edited_by'] = "not done";
	
		$response = $holiday->fill($input)->save();
	
		return redirect()->route('holidays.index')
										->with('flash_message',
										'Holiday successfully added.');
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
		$holidays = Holiday::findOrFail($id); //Get user with specified id			
		return view('holidays.edit', compact('holidays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HolidayRequest $request, $id)
    {
		//
		$holiday = Holiday::findOrFail($id);

		$input = $request->validated();
			
		$input['edited_by'] = Auth::user()->name;

		$response = $holiday->fill($input)->save();

		return redirect()->route('holidays.index')
								->with('flash_message',
								'Holiday successfully edited.');
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
