<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HostingChoiceController extends Controller
{
    public function Cloud()
    {
      return view('hosting.cloud',);
    }
    
    public function OnSite()
    {
      return view('hosting.onsite',);
    }
    
    public function Hybrid()
    {
      return view('hosting.hybrid',);
    }
    
    
    public function MultiTenancy()
    {
      return view('hosting.multitenancy',);
    }
}
