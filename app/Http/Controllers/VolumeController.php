<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volume;

class VolumeController extends Controller
{
  public function volume(){
      return view('settings')->with('volume', Volume::all()->first());
  }

  public function update(Request $request, $id){

    try{
      Volume::where('id', $id)->update([
        'volume' => $request->input('volume'),
        'niet_storen' => $request->input('niet_storen')
      ]);
      toastr()->success('Succesvol bel aangepast!');
      return redirect("settings");
    }
    catch(Exception $e) {
      toastr()->error('Dat ging niet goed...');
      return redirect('settings');
    }
  }
}
