<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Ringtone;
use File;
use Auth;

class ContactsController extends Controller
{

  public function profiles(){
      return view('profile.profiles')->with('contact', Contact::all());
  }

  public function savedProfile($profile){
      return view('profile.savedprofile')->with('profile', Contact::where('name', '=', $profile)->first());
  }

  public function updateProfile($profile){
      return view('profile.updateprofile')->with('profile', Contact::where('name', '=', $profile)->first())->with('ringtones', Ringtone::all());
  }

  public function update(Request $request, $contact){
    $pathAvatar = Contact::where('name', $contact)->get('avatar')[0]->avatar;
    $pathBanner = Contact::where('name', $contact)->get('banner')[0]->banner;

    if($request->has('avatar')){
      $avatar = $request->input('avatar');
      $pathAvatar = $request->file('avatar')->move('img/avatar/', $avatar);
    }

    // banner
    if($request->has('banner')){
      $banner = $request->input('banner');
      $pathBanner = $request->file('banner')->move('img/banner/', $banner);
    }

    try{
      Contact::where('name', $contact)->update([
          'avatar' => $pathAvatar,
          'banner' => $pathBanner,
          'name' => $request->input('name'),
          'door_access' => $request->input('door_access'),
          'ringtone' => $request->input('ringtone'),
          'priority' => $request->input('priority')
      ]);
      toastr()->success('Succesvol aangepast!');
      return redirect("profiles");
    }
    catch(Exception $e) {
      toastr()->error('Dat ging niet goed...');
      return redirect('profiles');
    }
  }
}
