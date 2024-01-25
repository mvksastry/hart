<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LicensingChoiceController extends Controller
{
    public function Perpetual()
    {
      return view('licensing.perpetual',);
    }
    
    public function Subscription()
    {
      return view('licensing.subscription',);
    }
    
    public function DataSecurity()
    {
      return view('licensing.datasecurity');
    }
    
    public function Maintenance()
    {
      return view('licensing.maintenance');
    }
}
