@extends('layouts.app')

@section('content')


<a href="home" class="back">< Terug naar Dashboard</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header volumeText">Geluids Instellingen</div>

                <div class="card-body">
                  <h1 class="volumeText">Volume</h1>
                  <div class="volumeControl">
                    <input type="range" min="0" max="100" class="volumeControl__slider" id="volumecontrol">
                    <img src="img/volume_down.webp" alt="volume down" class="volumeControl__slider__image volume_up">
                    <img src="img/volume_up.svg" alt="volume up" class="volumeControl__slider__image volume_down">
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="notificationBox" id="js--notification">
  <div class="notificationBox__background" id="js--notification_background"></div>
  <div class="notificationBox__window">
    <div class="notificationBox__topBar">
      <h2 class="notificationBox__topBar__title" id="js--notification_title">NOTIFICATIE</h2>
      <span class="notificationBox__topBar__close" id="js--notification_close">&times;</span>
    </div>
    <div class="notificationBox__main">
      <p class="notificationBox__main__text" id="js--notification_text">Er is iets fout met de bel! Er is geen vingerafdruk gescanned. Het is mogelijk dat de scanner vervangen moet worden.</p>

      <div class="notificationBox__main__button" id="js--notification_ok">begrepen</div>
    </div>
  </div>
</div>
