<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Ringtone;
use File;

class RingtonesController extends Controller
{

  /*
  |--------------------------------------------------------------------------
  | Ringtones Controller
  |--------------------------------------------------------------------------
  | Deze controller regelt alles wat te maken heeft met ringtones,
  | namelijk het inzien, toevoegen, verwijderen en terughalen ervan
  */

  // Mijn Ringtones View
  public function ringtone(){
      return view('ringtone')->with('ringtones', Ringtone::all());
  }

  // Functie die ervoor zorgt dat een ringtone toegevoegd wordt
  public function ringtoneAdd(Request $request){

      $ringtone = new Ringtone();

      if(!$request->input("title")){
        toastr()->warning("Geef een titel op!");
        return redirect("/ringtone");
      } else {
        $ringtone->title = $request->input('title');
      }

      if(!$request->has('ringtone')){
        toastr()->warning("Upload een ringtone!");
        return redirect("/ringtone");
      } else {
        $audio = $request->file('ringtone');
        $name = time().'.'.$audio->getClientOriginalExtension();
        $audio->move('ringtones', $name);
        $ringtone->ringtone = "ringtones/".$name;
      }

      try {
          $ringtone->save();
          toastr()->success('Ringtone aangemaakt!');
          return redirect('/ringtone');
      } catch(Exception $e){
          toastr()->error('Ringtone aanmaken is mislukt...');
          return redirect('/ringtone');
      }
    }

  // Functie die ervoor zorgt dat een ringtone verwijderd wordt
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

  // Functie die ervoor zorgt dat een verwijderde ringtone terug gehaald wordt
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
