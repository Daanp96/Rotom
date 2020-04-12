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
