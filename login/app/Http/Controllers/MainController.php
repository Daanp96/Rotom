<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;
use Validator;
use Auth;
use Hash;

class MainController extends Controller
{
    public function index(){
        return view('login');
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
        return view('successlogin');
    }

    public function logout(){
        Auth::logout();
        return redirect('main');
    }

    public function create(){
        return view('create');
    }

    public function checkcreate(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
//        $user->password = $request->input('password');

        try{
            $user->save();
            return redirect('main/');
        } catch(Exception $e) {
            return redirect('create/');
        }
    }
}
