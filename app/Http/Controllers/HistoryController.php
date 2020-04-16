<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Ringtone;
use App\History;
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
      return view('history')->with("history", History::all());
  }

}
