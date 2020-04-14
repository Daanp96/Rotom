<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
  public function settings(){
      return view('settings')->with('settings', Settings::all()->first());
  }

  public function update(Request $request, $id){

    try{
      Settings::where('id', $id)->update([
        'volume' => $request->input('volume'),
        'niet_storen' => $request->input('niet_storen'),
        'text_display'=> $request->input('text_display'),
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
