<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Ringtone;
use File;
use Auth;

class HistoryController extends Controller
{

  public function history(){
      return view('history');
  }

  public function addprofile(){
      return view('profile.addprofile')->with('ringtones', Ringtone::all());
  }

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
          return redirect('/profiles');
      } catch(Exception $e){
          toastr()->error('Contact aanmaken is mislukt...');
          return redirect('/history/addprofile');
      }
  }

}
