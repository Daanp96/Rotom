@extends('layouts.app')

@section('content')

<a href="home" class="back cancel">Terug naar Dashboard</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Mijn Contacten</div>
              <div class="card-body">



                <div class="searchbox">
                  <input id="js--searchbar" class="searchbar" type="text" placeholder="Zoek een contact">
                  <button class = "confirm search" id="js--sbtn">ZOEK</button>
                  <button class = "cancel search" id="js--bbtn">RESET</button>
                </div>

                <div class="dropdown">
                  <button class="">Sorteer</button>
                  <div id="" class="dropdown-content">
                    <a href="#">Alfabet</a>
                    <a href="#">Datum</a>
                  </div>
                </div>

                <!-- LIJST VAN CONTACTEN -->
                @foreach($contact as $contact)
                <div class="list history">
                  <div class="list__photo">
                      <img src="{{URL::asset($contact->avatar)}}" alt="" class="list__photo__img">
                  </div>
                    <p class="list__name">
                      <a href="/contacts/{{$contact->name}}">{{$contact->name}}</a>
                    </p>
                    <form action="contacts/delete/{{$contact->id}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="flex__delete" type="submit" name="delete">
                        <img class="flex__delete__img" src="img/delete.png" alt="delete">
                      </button>
                    </form>
                </div>
                @endforeach


              </div>
          </div>
      </div>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 settings__submit">
      <a href="/contacts/addcontact" class="confirm" id="contact__button">Klik hier om profiel aan te maken</a>
    </div>
  </div>
</div>
@endsection
