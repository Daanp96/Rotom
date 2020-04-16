@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                  <!-- WELKOM BERICHT DASHBOARD-->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Hallo  {{ Auth::user()->name }}!</h1>
                    <p>Laaste aangebeld!</p>
		    @foreach($history->reverse()->take(1) as $h)
		    <p>{{ $h-> contact_name }} - {{ $h->created_at }}</p>
		    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MIJN CONTACTEN -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <a href="contacts" class="card-header home">
                <img src="{{URL::asset('img/contacts.png')}}" class="home__icon" alt="">
                <p class="home__title">Mijn Contacten</p>
              </a>
            </div>
        </div>
    </div>
</div>

<!-- MIJN GESCHIEDENIS -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="history" class="card-header home">
                  <img src="{{URL::asset('img/history.png')}}" class="home__icon" alt="">
                  <p class="home__title">Mijn Geschiedenis</p>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- MIJN RINGTONES -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="ringtone" class="card-header home">
                  <img src="{{URL::asset('img/ringtones.png')}}" class="home__icon" alt="">
                  <p class="home__title">Mijn Ringtones</p>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- MIJN DEURBEL -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="settings" class="card-header home">
                  <img src="{{URL::asset('img/settings.png')}}" class="home__icon" alt="">
                  <p class="home__title">Mijn Deurbel</p>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- OPEN DEUR -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="opendoor/2" method="post">
              @csrf
              @method('PUT')
              <button class="confirm" name="is_pressed" value="1" type="submit">Open Deur</button>
            </form>
        </div>
    </div>
</div>
@endsection
