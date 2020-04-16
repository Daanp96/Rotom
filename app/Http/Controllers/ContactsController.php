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
      return view('contact.contacts')->with('contact', Contact::all());
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

  public function ringbell(Request $request, $contact, $id){
    try{
      Buttons::where('button_id', $id)->update([
          'is_pressed' => true,
          'contact_id' => $contact
      ]);
      toastr()->success('Vinger is gescanned!!');
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

}
