<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use Auth;
use App\Models\Projectgoals;
use App\Models\Projtask;
use App\Models\User;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      return view('projects.createProjectTasks',compact('goalId'));
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
      $input = $request->all();
      
      $pTask = new Projtask();
      
      
      $pTask->project_id  =  $input['project_id'];
      $pTask->projectgoal_id  = $input['goal_id'];
      $pTask->taskowner_id  =  $input['taskowner_id'];
      $pTask->uuid  =  $input['uuid'];
      $pTask->activity  =  $input['activity'];
      $pTask->task_desc  =  $input['task_desc'];
      $pTask->task_starts  =  $input['task_starts'];
      $pTask->task_ends  =  $input['task_ends'];
      $pTask->budget  =  $input['budget'];
      $pTask->date_posted  =  date('Y-m-d');
      $pTask->updated_by  =  Auth::user()->id;
      $pTask->percent_progress  =  $input['percent_progress'];
      $pTask->comment  =  $input['comment'];
      //dd($input, $pTask);
      $pTask->save();
      
      $message =  "Task Assigned and Saved";
      return redirect()->route(‘projects.show’,  $input['uuid']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $goalId = Projectgoals::with('project')->where('projectgoal_id', $id)->first();
      $users = User::whereHas(
                              'roles', function($q){
                                  $q->where('name', 'employee');
                              }
                      )->get();
      //dd($users);
      
      return view('projects.createProjectTasks',compact('goalId', 'users'));
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
