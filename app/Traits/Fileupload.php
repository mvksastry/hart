<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use File;

trait Fileupload
{
  //
  /**
   * Check file validity and move to uploads folder
   *
   * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
   * @return boolean
   */
  public function uploadFile($file, $input)
  {

    //$tenant = app(\Hyn\Tenancy\Website\Directory::class)->path();
    $fileName =  str_replace(" ", "", $file->getClientOriginalName());
 
    // getting file extension
    //$extension = $file->getClientOriginalExtension();

    //delete any old file in the directory by the same name
    if(Storage::disk('public')->exists($input['destinationPath'].$fileName))
    {
      Storage::delete($input['destinationPath'], $input['old_file'], 'public');
    }
    
    $file->storeAs($input['destinationPath'], $fileName, 'public');
    
    return $fileName;
    
  }
		
}