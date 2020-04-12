@extends('layouts.app')

@section('content')


<a href="home" class="back">< Terug naar Dashboard</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Geluids Instellingen</div>

                <div class="card-body">
                  <h1 class="volumeText">Volume</h1>
                  <div class="volumeControl">
                    <input type="range" min="0" max="100" class="volumeControl__slider" id="volumecontrol">
                    <img src="img/volume_down.png" alt="volume down" class="volumeControl__slider__image volume_up">
                    <img src="img/volume_up.png" alt="volume up" class="volumeControl__slider__image volume_down">
                  </div>

                  <h1 class="volumeText mute">Niet Storen</h1>
                  <div class="volumeControl">
                  <img src="img/mute.png" alt="volume down" class="volumeControl__slider__image">
                  <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                  </label>
                    <p>* Alleen contacten met hoge prioriteit kunnen nog aanbellen.</p>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
