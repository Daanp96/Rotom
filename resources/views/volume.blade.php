@extends('layouts.app')

@section('content')


<a href="home" class="back cancel">Terug naar Dashboard</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="volume/update/{{$volume->id}}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="card-header">Geluids Instellingen</div>
                  <div class="card-body">
                    <h1 class="volumeText">Volume</h1>
                    <div class="volumeControl">
                      <input type="range" min="0" max="100" value="{{$volume->volume}}" class="volumeControl__slider" id="volumecontrol" name="volume">
                      <img src="img/volume_down.png" alt="volume down" class="volumeControl__slider__image volume_up">
                      <img src="img/volume_up.png" alt="volume up" class="volumeControl__slider__image volume_down">
                    </div>

                    <h1 class="volumeText mute">Niet Storen</h1>
                    <div class="volumeControl">
                    <img src="img/mute.png" alt="volume down" class="volumeControl__slider__image">
                    <label class="switch">
                      @if($volume->niet_storen == 'on')
                        <input type="checkbox" name="niet_storen" checked>
                      @else
                        <input type="checkbox" name="niet_storen">
                      @endif
                      <span class="slider round"></span>
                    </label>
                      <p>* Alleen contacten met hoge prioriteit kunnen nog aanbellen.</p>
                  </div>
                  <button class="edit__button confirm" type="submit" name="button">Opslaan</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
