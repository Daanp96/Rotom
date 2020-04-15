@extends('layouts.welcome')

@section('content')

<img src="{{URL::asset("img/logo.png")}}" alt="" class="welcome__logo">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card welcome">
                <div class="card-body">

                      <h1 class="welcome__title">Welkom bij de ROTOM App!</h1>
                      <h2 class="welcome__text">Bestuur uw deurbel op afstand</h2>

                      <a href="home" class="welcome__button">
                          <h2 class="welcome__button__text">START</h2>
                      </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
