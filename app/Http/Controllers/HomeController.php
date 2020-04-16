<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use App\Buttons;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with("history", History::all());
        return view('home')->with('button', Buttons::where('button_id', "=", 2)->first());
    }

    public function opendoor(Request $request, $id){
      try{
        Buttons::where('button_id', $id)->update([
            'is_pressed' => 1
        ]);
        toastr()->success('Deur is geopend!!');
        return redirect("home");
      }
      catch(Exception $e) {
        toastr()->error('Er ging iets mis...');
        return redirect('home');
      }
    }
}
