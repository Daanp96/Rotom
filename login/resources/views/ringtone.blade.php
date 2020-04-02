@extends('layouts.app')

@section('content')

<a href="home" class="back"><</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ringtone Toevoegen</div>

                <div class="card-body">
                  <form class="form" action="/ringtone/add" method="POST">
                    @csrf

                    <label for="ringtone">Kies een audio bestand:</label>
                    <input type="file" name="ringtone">

                    <label for="title">Geef de ringtone een naam:</label>
                    <input type="text" name="title" placeholder="Geef de ringtone een titel">

                      <button type="submit" name="button">Maak rintone aan</button>
                  </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Mijn Ringtones</div>

                <div class="card-body">
                    @foreach($ringtones as $ringtone)
                        <p>{{$ringtone->title}}</p>
                        <audio controls>
                            <source src="{{$ringtone->ringtone}}" type="audio/mpeg">
                        </audio>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
