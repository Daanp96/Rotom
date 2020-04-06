@extends('layouts.app')

@section('content')

<a href="home" class="back">< Terug naar Dashboard</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Mijn Ringtones</div>
              <div class="card-body">
                  @foreach($ringtones as $ringtone)
                    <form action="/ringtone/remove/{{$ringtone->title}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="flex">
                      <audio class="flex__player" controls preload>
                          <source src="{{$ringtone->ringtone}}" type="audio/mpeg">
                      </audio>
                      <p class="flex__title">{{$ringtone->title}}</p>
                      <button class="flex__delete" type="submit" name="delete">
                        <img class="flex__delete__img" src="img/delete.png" alt="">
                      </button>
                    </div>
                    </form>
                  @endforeach
                  <form class="form undo" action="/ringtone/restore" method="POST">
                    @csrf
                    <button class="undo__button cancel" type="submit" name="button">Verwijderde Ringtones Terughalen</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Ringtone Toevoegen</div>
          <div class="card-body">
            <form class="add" action="/ringtone/add" method="POST" enctype="multipart/form-data">
              @csrf
                <label class="add__label" for="ringtone">Kies een audio bestand:</label>
                <input class="add__ringtone" type="file" name="ringtone">
                <label class="add__label" for="title">Geef de ringtone een naam:</label>
                <input class="add__name" type="text" name="title" placeholder="Ringtone naam">
                <button class="add__submit confirm" type="submit" name="button">Maak ringtone aan</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
