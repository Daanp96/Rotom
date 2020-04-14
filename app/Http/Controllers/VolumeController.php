<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VolumeController extends Controller
{
  public function volume(){
      return view('volume');
  }
}
