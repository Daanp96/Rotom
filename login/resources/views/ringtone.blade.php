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
                    <div class="grid">
                      <p class="grid__title">{{$ringtone->title}}</p>
                        <button class="grid__delete" type="submit" name="delete">VERWIJDER</button>
                      <audio class="grid__player" controls preload>
                          <source src="{{$ringtone->ringtone}}" type="audio/mpeg">
                      </audio>
                    </div>
                    </form>
                  @endforeach
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
            <form class="form add" action="/ringtone/add" method="POST" enctype="multipart/form-data">
              @csrf
                <label class="add__label" for="ringtone">Kies een audio bestand:</label>
                <input class="add__name" type="file" name="ringtone">
                <label class="add__label" for="title">Geef de ringtone een naam:</label>
                <input class="add__ringtone" type="text" name="title" placeholder="Geef de ringtone een titel">
                <button class="add__submit" type="submit" name="button">Maak ringtone aan</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
