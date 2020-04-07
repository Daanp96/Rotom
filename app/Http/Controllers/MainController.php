<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;
use App\Contact;
use App\Ringtone;
use File;
use Validator;
use Auth;
use Hash;

class MainController extends Controller
{
    //VOLUME
    public function volume(){
        return view('volume');
    }

    //GESCHIEDENIS
    public function history(){
        return view('history');
    }

    //RINGTONES
    public function ringtone(){
        return view('ringtone')->with('ringtones', Ringtone::all());
    }

    public function ringtoneAdd(Request $request){

        $audio = $request->file('ringtone');
        $name = time().'.'.$audio->getClientOriginalExtension();
        $destinationPath = base_path('ringtones');
        $audio->move('ringtones', $name);

        $ringtone = new Ringtone();
        $ringtone->title = $request->input('title');
        $ringtone->ringtone = "ringtones/".$name;
        // $ringtoneName = $request->input('ringtone');
        // $ringtone->ringtone = "ringtones/".$ringtoneName;

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

    //CONTACTS
    public function profiles(){
        return view('profile.profiles')->with('contact', Contact::all());
    }

    public function testprofile(){
        return view('profile.testprofile')->with('ringtones', Ringtone::all());
    }

    public function savedProfile($profile){
        return view('profile.savedprofile')->with('profile', Contact::where('name', '=', $profile)->first());
    }

    public function store(Request $request){
        $contact = new Contact();
        $contact->name = $request->input('name');

        // avatar
        $avatar = $request->input('avatar');
        $path = $request->file('avatar')->move('img/avatar/', $avatar);
        $contact->avatar = $path;

        // banner
        $banner = $request->input('banner');
        $path = $request->file('banner')->move('img/banner/', $banner);
        $contact->banner = $path;

        $contact->door_access = $request->input('door_access');
        $contact->ringtone = $request->input('ringtone');
        $contact->priority = $request->input('priority');

        try {
            $contact->save();
            toastr()->success('Contact aangemaakt!');
            return redirect('/profiles');
        } catch(Exception $e){
            toastr()->error('Contact aanmaken is mislukt...');
            return redirect('/testprofile');
        }
    }

    public function updateProfile($profile){
        return view('profile.updateprofile')->with('profile', Contact::where('name', '=', $profile)->first());
    }
}






// OUDE LOGIN
    // public function index(){
    //     return view('login.login');
    // }

    // public function successlogin(){
    //     return view('login.successlogin');
    // }
    //
    // public function logout(){
    //     Auth::logout();
    //     return redirect('main');
    // }
    //
    // public function create(){
    //     return view('login.create');
    // }
    //
    // public function checkcreate(Request $request){
    //     $user = new User();
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->password = Hash::make($request->input('password'));
    //
    //     try{
    //         $user->save();
    //         return redirect('main/');
    //     } catch(Exception $e) {
    //         return redirect('create/');
    //     }
    // }
    //
    // public function checklogin(Request $request) {
    //     try {
    //         $this->validate($request, [
    //             'name' => 'required',
    //             'password' => 'required|min:3'
    //         ]);
    //     } catch (ValidationException $e) {
    //         return back()->with('error', 'Wrong Login Details');
    //     }
    //
    //     $user_data = array(
    //         'name'  => $request->get('name'),
    //         'password' => $request->get('password')
    //     );
    //
    //     if(Auth::attempt($user_data)) {
    //         return redirect('main/successlogin');
    //     }
    //     else {
    //         return back()->with('error', 'Wrong Login Details');
    //     }
    //
    // }
