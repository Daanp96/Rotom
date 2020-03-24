<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;
use App\Contact;
use Validator;
use Auth;
use Hash;

class MainController extends Controller
{
    public function index(){
        return view('login.login');
    }

    public function checklogin(Request $request) {
        try {
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required|min:3'
            ]);
        } catch (ValidationException $e) {
            return back()->with('error', 'Wrong Login Details');
        }

        $user_data = array(
            'name'  => $request->get('name'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)) {
            return redirect('main/successlogin');
        }
        else {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    public function successlogin(){
        return view('login.successlogin');
    }

    public function logout(){
        Auth::logout();
        return redirect('main');
    }

    public function create(){
        return view('login.create');
    }

    public function checkcreate(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        try{
            $user->save();
            return redirect('main/');
        } catch(Exception $e) {
            return redirect('create/');
        }
    }

    public function testprofile(){
        return view('profile.testprofile');
    }

    public function store(Request $request){
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->door_access = $request->input('door_access');

        $ringtoneName = $request->input('ringtone');
        $path = $request->file('ringtone')->move('ringtones/', $ringtoneName);
        $contact->ringtone = $path;

        $contact->priority = $request->input('priority');

        try {
            $contact->save();
            return redirect('/testprofile');
        } catch(Exception $e){
            return redirect('/');
        }
    }
}
