@extends('layouts.app')

@section('content')

<a href="/home" class="back cancel">Terug naar Dashboard</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Mijn Contacten</div>
              <div class="card-body">

                <!-- ZOEKBALK -->
                <div class="searchbox">
                  <input id="js--searchbar" class="searchbar" type="text" placeholder="Zoek een contact">
                  <button class = "confirm search" id="js--sbtn">ZOEK</button>
                  <a href="/contacts" class="cancel search">RESET</a>
                  <!-- <a class = "cancel search" id="js--bbtn">RESET</button> -->
                </div>

                <div class="filter_sort">

                  <!-- FILTEREN -->
                  <form class="" action="/contacts/filter" method="get">
                    <div class="filter">
                      <div class="filter_option">
                        <p>Filter op: </p>
                        <input type="checkbox" id="high_priority" name="filter_high_priority">
                        <label for="high_priority">Hoge Prioriteit</label>
                      </div>
                      <div class="filter_option">
                        <input type="checkbox" id="door_access" name="filter_door_access">
                        <label for="door_access">Deurtoegang</label>
                      </div>
                      <button class="filter__button confirm" type="submit" name="filter_submit">Filter</button>
                    </div>
                  </form>

                  <!-- SORTEREN -->
                  <form class="" action="/contacts/sort" method="get">
                    <div class="sort">
                      <div class="sort_option">
                        <p>Sorteer op: </p>
                        <select class="sort_options" name="sort_option">
                          <option value="alphabetical">Naam (A-Z)</option>
                          <option value="reverse">Naam (Z-A)</option>
                          <option value="last_added">Laatst toegevoegd</option>
                          <option value="first_added">Eerst toegevoegd</option>
                        </select>
                      </div>
                      <input class="confirm filter__button sort__button" type="submit" name="sort_submit" value="Sorteer">
                    </div>
                  </form>

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
                        <img class="flex__delete__img" src="/img/delete.png" alt="delete">
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
