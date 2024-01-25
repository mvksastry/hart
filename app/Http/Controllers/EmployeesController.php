<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Employee;
use App\Models\User;
use Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;
use Illuminate\Support\Facades\Hash;

//Requests
use App\Http\Requests\EmployeeFormRequest;

use App\Traits\Baseinfo;

class EmployeesController extends Controller
{
  use Baseinfo;
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //Get all users and pass it to the view
      //$employees = Employee::with('user')->get();
      //dd($employees);
      //$employees = User::with('employee')->where('name','<>','admin smoffice')->get(); 
      $employees = User::with('employee')->simplePaginate(10); 
      foreach($employees as $row)
      {
        $res = Employee::where('employee_id', $row->id)->first();
        if($res != null )
        {
          $row->details = "yes";
        }
        else {
          $row->details = "no";
        }
      }
      //dd($employees);
      return view('employees.index')->with('employees', $employees);
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
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $employee = Employee::with('user')->where('employee_id', $id)->first();
      return view('employees.showEmployeeDetails')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //Get all roles and pass it to the view
      $roles = Role::pluck('name', 'id');
      $employee = User::findOrFail($id); //Get user with specified id	
      //dd($employee);      
      return view('employees.edit', compact('employee', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeFormRequest $request, $id)
    {
        //Retrieving only the description
        $input = $request->validated();       
        $input['employee_id'] = $id;
        $input['folder_name'] = $this->generateCode(15);
        //dd($id, $input);
        $result = Employee::create($input); 
        //Redirect to the leavetypes.index view and display message
        return redirect()->route('employees.index')
            ->with('flash_message',
             'Emplyee Details Posted Successfully.');
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
        //dd($id);
        session()->flash("danger", "User Deletion Prohibited!");
    }
}
