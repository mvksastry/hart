<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//models
use App\Models\Group;
use App\Models\Employee;
use App\Models\Itax;
use App\Models\User;

//Traits
use App\Traits\Baseinfo;
use App\Traits\Duedate;

use Illuminate\Support\Facades\Route;


class ProfileController extends Controller
{
  use Baseinfo, Duedate;
  
  public function __construct()
	{
		$this->middleware('auth');
	}
  
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
    
      $employee = User::with('employee')->where('id', Auth::user()->id )->first();
  //dd($employee);
      if( Auth::user()->hasExactRoles(['employee']) )
      {
        return view('layouts.home.profileCommon', compact('employee'));
      }
      
      if( Auth::user()->hasExactRoles(['supervisor', 'employee']) )
      {
        return view('layouts.home.profileCommon', compact('employee'));
      }
      
      if( Auth::user()->hasExactRoles(['admin', 'employee']) )
      {
        return view('layouts.home.profileCommon', compact('employee'));
      }
      
      if( Auth::user()->hasExactRoles(['director', 'employee']) )
      {
        return view('layouts.home.profileCommon', compact('employee'));
      }
      
      if( Auth::user()->hasExactRoles(['sysadmin']) )
      {
        return view('layouts.home.profileCommon', compact('employee'));
      }
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
        //
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
