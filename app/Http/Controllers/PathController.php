<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//models
use App\Models\User;
use App\Models\Communication;
use App\Models\Group;
use App\Models\Researcher;
use App\Models\Note;
use App\Models\Hop;
use App\Models\Path;

//Traits
use App\Traits\Baseinfo;
use App\Traits\Comments;
use App\Traits\Fileupload;
use App\Traits\Groupidentity;
use App\Traits\Nexthop;
use App\Traits\Queries;
use App\Traits\Trail;


class PathController extends Controller
{
  use Baseinfo, Comments, Fileupload, Queries, Nexthop, Groupidentity, Trail;
      
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    //$paths = Path::with('roleName')->get(); 
    $paths = $this->allPathBreadCrumbArray();
    //dd($paths);
    return view('paths.index')->with('paths', $paths);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $userGroup = $this->getUserGroup();
    //dd($userGroup);
    //Get all roles and pass it to the view
    //$roles = Role::pluck('name', 'id');
    return view('paths.create', ['userGroup'=>$userGroup]);
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
      $this->validate($request, [
        'pathname'  => 'required|regex:/^[\pL\s\-_ 0-9]+$/u|max:250',
      ]);

      $input = $request->only('pathname');
        
      //route changed by admin or director
      $ts = $request->only('groupd');
      $tx = $ts['groupd'];
      //dd($input, $tx);
      $newPath = $this->makeNewDefaultPath($tx);
      
      $path = new Path();
      $path->role_id = 10;
      $path->controller = $input['pathname'];
      $path->path = json_encode($newPath, true);
      $path->posted_by = Auth::user()->name;
      $path->save();
      //dd($path);
      return redirect()->route('paths.index')
        ->with('flash_message',
          'New Path Created Successfully'); 
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
      $path = Path::where('path_id', $id)->first();
      $userGroup = $this->getUserGroup();
      return view('paths.edit', compact('path', 'userGroup'));
    }

    private function getUserGroup()
    {
      $userGroup = $this->usersByRoles();
      unset($userGroup['Chairman']);
      unset($userGroup['Secretary']);
      unset($userGroup['Convener']);
      unset($userGroup['Member']);
      unset($userGroup['Technical']);
      unset($userGroup['user']);
      unset($userGroup['researcher']);
      unset($userGroup['staff']);
      return $userGroup;
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
      $path = Path::where('path_id', $id)->first();
        
      $this->validate($request, [
        'pathname'  => 'required|regex:/^[\pL\s\-_ 0-9]+$/u|max:250',
      ]);

      $input = $request->only('pathname');
        
      //route changed by admin or director
      $ts = $request->only('groupd');
      $tx = $ts['groupd'];
        
      $newPath = $this->makeNewDefaultPath($tx);
      dd($newPath);
      $path->controller = $input['pathname'];
      $path->path = json_encode($newPath, true);
      $path->posted_by = Auth::user()->name;
      //dd($path);
      $path->save();

      return redirect()->route('paths.index')
      ->with('flash_message',
       'New Path Created Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
      Path::where('path_id', $id)->delete();
			
      return redirect()->route('paths.index')
							->with('flash_message', 'Path Deleted Successfully'); 
    }
}
