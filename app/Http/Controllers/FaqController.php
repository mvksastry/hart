<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function OfficeArchitecture()
    {
      return view('faq.offarch',);
    }
    
    public function WorkFlows()
    {
      return view('faq.workflows');
    }
    
    public function DecisionFlows()
    {
      return view('faq.decisionflows');
    }
    
    public function Customization()
    {
      return view('faq.customization');
    }
    

}
