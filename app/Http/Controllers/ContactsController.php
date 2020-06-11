<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Ringtone;
use App\Buttons;
use File;
use Auth;

class ContactsController extends Controller
{

  /*
  |--------------------------------------------------------------------------
  | Contacts Controller
  |--------------------------------------------------------------------------
  | Deze controller regelt alles wat te maken heeft met bestaande contacten,
  | namelijk het updaten en inzien
  */

  // Mijn Contacten View
  public function contacts(){
      return view('contact.contacts')->with('contact', Contact::orderBy(strtolower('name'), 'ASC')->get());
  }

  // View voor een opgeslagen contact
  public function savedContact($contact){
      return view('contact.savedcontact')->with('contact', Contact::where('name', '=', $contact)->first());
  }

  // View voor het aanpassen van een opgeslagen contact
  public function updateContact($contact){
      return view('contact.updatecontact')->with('contact', Contact::where('name', '=', $contact)->first())->with('ringtones', Ringtone::all());
  }

  // View voor het toevoegen van een onbekend contact
  public function addContact(){
      return view('contact.addcontact')->with('ringtones', Ringtone::all());
  }

  // Functie die er voor zorgt dat een nieuw contact aangemaakt wordt
  public function store(Request $request){

      $contact = new Contact();

      if(!$request->input('name')){
        toastr()->warning("Vul een naam in!");
        return redirect("/contacts/addcontact");
      } else {
        $contact->name = $request->input('name');
      }

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
          return redirect('/contacts/addcontact');
      }
  }

  public function ringbell(Request $request, $contact, $id){
    try{
      Buttons::where('button_id', $id)->update([
          'is_pressed' => true,
          'contact_id' => $contact
      ]);
      toastr()->warning('Loop nu naar de scanner!');
      return redirect("contacts");
    }
    catch(Exception $e) {
      toastr()->error('Er ging iets mis...');
      return redirect('contacts');
    }
  }

  //Functie die ervoor zorgt dat wijzigingen doorgevoerd worden
  public function update(Request $request, $contact){
    //avatar
    $pathAvatar = Contact::where('name', $contact)->get('avatar')[0]->avatar;
    if($request->has('avatar')){
      $avatar = $request->input('avatar');
      $pathAvatar = $request->file('avatar')->move('img/avatar/', $avatar);
    }

    // banner
    $pathBanner = Contact::where('name', $contact)->get('banner')[0]->banner;
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
      return redirect("contacts");
    }
    catch(Exception $e) {
      toastr()->error('Dat ging niet goed...');
      return redirect('contacts');
    }
  }

  // Functie die ervoor zorgt dat een contact verwijderd wordt
  public function contactRemove($remove){
    try{
        Contact::where('id', $remove)->delete();
        toastr()->success('Contact verwijderd!');
        return redirect('/contacts');
    } catch(Exception $e){
        toastr()->error("Contact verwijderen is mislukt...");
        return redirect('/contacts');
    }
  }

  public function filter(Request $request){
    if($request->filter_high_priority && $request->filter_door_access){
      $matchThese = ['door_access'=>'custom', 'priority'=>True];
      return view('contact.contacts')->with('contact', Contact::where($matchThese)->get());

    } else if($request->filter_high_priority) {
      return view('contact.contacts')->with('contact', Contact::where('priority', '=', True)->get());

    } else if($request->filter_door_access){
      return view('contact.contacts')->with('contact', Contact::where('door_access', '=', "custom")->get());

    } else {
      return view('contact.contacts')->with('contact', Contact::all());

    }
  }

  public function sort(Request $request){
    if($request->sort_option === "reverse"){
      return view('contact.contacts')->with('contact', Contact::orderBy(strtolower('name'), 'DESC')->get());
    } else if($request->sort_option === "last_added"){
      return view('contact.contacts')->with('contact', Contact::orderBy('id', 'DESC')->get());
    } else if($request->sort_option === "first_added"){
      return view('contact.contacts')->with('contact', Contact::orderBy('id', 'ASC')->get());
    }
    return view('contact.contacts')->with('contact', Contact::orderBy(strtolower('name'), 'ASC')->get());
  }

}
