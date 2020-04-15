@extends('layouts.app')

@section('content')


<a href="home" class="back cancel">Terug naar Dashboard</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="settings/update/{{$settings->id}}" method="post">

                  <!-- FORM VOOR AANPASSEN INSTELLING -->
                  @csrf
                  @method('PUT')
                  <div class="card-header">Instellingen Deurbel</div>
                  <div class="card-body">
                    <!-- VOLUME-->
                    <h1 class="volumeText">Volume</h1>
                    <div class="volumeControl">
                      <input type="range" min="0" max="100" value="{{$settings->volume}}" class="volumeControl__slider" id="volumecontrol" name="volume">
                      <img src="img/volume_down.png" alt="volume down" class="volumeControl__slider__image volume_up">
                      <img src="img/volume_up.png" alt="volume up" class="volumeControl__slider__image volume_down">
                    </div>

                    <!-- NIET STOREN-->
                    <h1 class="volumeText mute">Niet Storen</h1>
                    <div class="volumeControl">
                    <img src="img/mute.png" alt="volume down" class="volumeControl__slider__image">
                    <label class="switch">
                      @if($settings->niet_storen == 'on')
                        <input type="checkbox" name="niet_storen" checked>
                      @else
                        <input type="checkbox" name="niet_storen">
                      @endif
                      <span class="slider round"></span>
                    </label>
                      <p>* Alleen contacten met hoge prioriteit kunnen nog aanbellen.</p>
                  </div>

                  <!-- TEKST DISPLAY-->
                  <h1 class="volumeText">Tekst Display</h1>
                  <div class="volumeControl">
                  <label>Dit is de tekst die bezoekers zullen lezen op de display:</label>
                  <select class="" name="">
                    @if($settings->text_display == 'default')
                      <option value="default" selected>Leg uw vinger op de scanner.</option>
                      <option value="away" >Ik ben niet thuis.</option>
                      <option value="mute">Niet storen a.u.b.</option>
                      <option value="later">Kom later terug</option>
                      <option value="johova">Geen Johova's</option>
                    @endif
                  </select>

                <!--SUBMIT-->
                </div>
                <button class="edit__button confirm" type="submit" name="button">Opslaan</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
