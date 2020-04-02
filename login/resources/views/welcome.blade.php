@extends('layouts.layout')

@section('content')
    <img src="{{URL::asset("img/logo.png")}}" alt="placeholder profile picture" class="welcome__logo">
    <div class="welcome">
        <h1 class="welcome__title">Welkom bij de ROTOM App!</h1>
        <h2 class="welcome__text">Bestuur uw deurbel op afstand</h2>

        <a href="home" class="welcome__button">
            <h2 class="welcome__button__text">START</h2>
        </a>
    </div>
@endsection
