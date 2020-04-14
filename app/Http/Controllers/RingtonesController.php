<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Ringtone;
use File;

class RingtonesController extends Controller
{

  public function ringtone(){
      return view('ringtone')->with('ringtones', Ringtone::all());
  }

  public function ringtoneAdd(Request $request){

      $audio = $request->file('ringtone');
      $name = time().'.'.$audio->getClientOriginalExtension();
      $audio->move('ringtones', $name);

      $ringtone = new Ringtone();
      $ringtone->title = $request->input('title');
      $ringtone->ringtone = "ringtones/".$name;

      try {
          $ringtone->save();
          toastr()->success('Ringtone aangemaakt!');
          return redirect('/ringtone');
      } catch(Exception $e){
          toastr()->error('Ringtone aanmaken is mislukt...');
          return redirect('/ringtone');
      }
    }

  public function ringtoneRemove($remove){
    try{
        Ringtone::where('title', $remove)->delete();
        toastr()->success('Ringtone verwijderd!');
        return redirect('/ringtone');
    } catch(Exception $e){
        toastr()->error("Ringtone verwijderen is mislukt...");
        return redirect('/ringtone');
    }
  }

  public function ringtoneRestore(){
      try{
          Ringtone::onlyTrashed()->restore();
          toastr()->success('Ringtone succesvol terug gebracht!');
          return redirect('/ringtone');
      } catch(Exception $e){
          toastr()->error('Ringtone terughalen mislukt...');
          return redirect('/ringtone');
      }
  }
}
