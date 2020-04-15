<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Ringtone;
use File;
use Auth;

class HistoryController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | History Controller
  |--------------------------------------------------------------------------
  | Deze controller zorgt dat je de geschiedenis kan inzien van mensen die
  | hebben aangebeld en dat je onbekenden kan toevoegen aan de contactenlijst
  */

  // Mijn Geschiedenis View
  public function history(){
      return view('history');
  }

  // View voor het toevoegen van een onbekend contact
  public function addContact(){
      return view('contact.addcontact')->with('ringtones', Ringtone::all());
  }

  // Functie die er voor zorgt dat een nieuw contact aangemaakt wordt
  public function store(Request $request){

      $contact = new Contact();
      $contact->name = $request->input('name');

      // avatar
      if($request->has('avatar')){
        $avatar = $request->input('avatar');
        $path = $request->file('avatar')->move('img/avatar/', $avatar);
        $contact->avatar = $path;
      }

      // banner
      if($request->has('banner')){
        $banner = $request->input('banner');
        $path = $request->file('banner')->move('img/banner/', $banner);
        $contact->banner = $path;
      }

      $contact->door_access = $request->input('door_access');
      $contact->ringtone = $request->input('ringtone');
      $contact->priority = $request->input('priority');

      try {
          $contact->save();
          toastr()->success('Contact aangemaakt!');
          return redirect('/contacts');
      } catch(Exception $e){
          toastr()->error('Contact aanmaken is mislukt...');
          return redirect('/history/addcontact');
      }
  }

}
