<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volume;

class VolumeController extends Controller
{
  public function volume(){
      return view('volume')->with('volume', Volume::all()->first());
  }

  public function update(Request $request, $id){

    try{
      Volume::where('id', $id)->update([
        'volume' => $request->input('volume'),
        'niet_storen' => $request->input('niet_storen')
      ]);
      toastr()->success('Succesvol volume aangepast!');
      return redirect("volume");
    }
    catch(Exception $e) {
      toastr()->error('Dat ging niet goed...');
      return redirect('volume');
    }
  }
}
