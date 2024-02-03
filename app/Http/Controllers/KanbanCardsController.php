<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//models
use App\Models\Kanbanboards;
use App\Models\Kanbancards;

//Uuid import class
use Webpatser\Uuid\Uuid;

class KanbanCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kanban_cards = Kanbancards::all();
        return view('layouts.kanban.indexCards', compact('kanban_cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $todo = Kanbanboards::where('name', 'todo')->pluck('uuid');
      
      return view('layouts.kanban.createCard', compact('todo'));
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
      //dd($input);
      $kcard = new Kanbancards();
      $kcard->kboboard_id = $input['todo_id'];
      $kcard->item_name = $input['card_name'];
      $kcard->item_desc = $input['description'];
      $kcard->item_status = 1;
      $kcard->status_date = date('Y-m-d');
      $kcard->posted_by = Auth::user()->name;
      //dd($kcard);
      $kcard->save();
      
      return redirect()->route('kanban-cards.index')
        ->with('flash_message',
            'New Board Registered successfully.');
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
