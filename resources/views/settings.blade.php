@extends('layouts.app')

@section('content')


<a href="home" class="back cancel">Terug naar Dashboard</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Mijn Deurbel</div>
              <div class="card-body">
                Hier kunnen de instellingen van de Rotom Deurbel aangepast worden.
              </div>
          </div>
      </div>
  </div>
</div>

<form action="settings/update/{{$settings->id}}" method="post">
  <!-- FORM VOOR AANPASSEN INSTELLING -->
  @csrf
  @method('PUT')

  <!-- VOLUME-->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Volume</div>
          <div class="card-body settings">
              <input type="range" min="0" max="100" value="{{$settings->volume}}" class="settings__slider" id="settings" name="volume">
              <img src="img/volume_down.png" alt="volume down" class="settings__slider__image volume_up">
              <img src="img/volume_up.png" alt="volume up" class="settings__slider__image volume_down">
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- NIET STOREN-->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Niet Storen</div>
          <div class="card-body">

              <img src="img/mute.png" alt="volume down" class="settings__slider__image">
              <label class="switch">
                @if($settings->niet_storen == 'on')
                  <input type="checkbox" name="niet_storen" checked>
                @else
                  <input type="checkbox" name="niet_storen">
                @endif
                <span class="slider round"></span>
              </label>
                <p>* Alleen contacten met hoge prioriteit kunnen nog aanbellen.</p>

                  <div class="volumeControl">
                  <label>Dit is de tekst die bezoekers zullen lezen op de display:</label>
                  <select name="text_display">
                      @switch($settings->text_display)
                        @case("away")
                          <option value="away" selected>Ik ben niet thuis.</option>
                          <option value="default">Leg uw vinger op de scanner.</option>
                          <option value="mute">Niet storen a.u.b.</option>
                          <option value="later">Kom later terug</option>
                          <option value="johova">Geen Johova's</option>
                        @break
                        @case("mute")
                          <option value="mute" selected>Niet storen a.u.b.</option>
                          <option value="default">Leg uw vinger op de scanner.</option>
                          <option value="away" >Ik ben niet thuis.</option>
                          <option value="later">Kom later terug</option>
                          <option value="johova">Geen Johova's</option>
                        @break
                        @case("later")
                          <option value="later" selected>Kom later terug</option>
                          <option value="default">Leg uw vinger op de scanner.</option>
                          <option value="mute">Niet storen a.u.b.</option>
                          <option value="away" >Ik ben niet thuis.</option>
                          <option value="johova">Geen Johova's</option>
                        @break
                        @case("johova")
                          <option value="johova" selected>Geen Johova's</option>
                          <option value="default">Leg uw vinger op de scanner.</option>
                          <option value="later">Kom later terug</option>
                          <option value="mute">Niet storen a.u.b.</option>
                          <option value="away" >Ik ben niet thuis.</option>
                        @break
                        @default
                          <option value="default" selected>Leg uw vinger op de scanner.</option
                          <option value="later">Kom later terug</option>
                          <option value="mute">Niet storen a.u.b.</option>
                          <option value="away" >Ik ben niet thuis.</option>
                          <option value="johova">Geen Johova's</option>
                      @endswitch
                  </select>
                </div>
                  <button class="edit__button confirm" type="submit" name="button">Opslaan</button>
                  </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- TEKST DISPLAY-->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Tekst Display</div>
          <div class="card-body">
            <label>Dit is de tekst die bezoekers zullen lezen op de display:</label>
            <select class="settings__select" name="text_display">
                @switch($settings->text_display)
                  @case("away")
                    <option value="away" selected>Ik ben niet thuis.</option>
                    <option value="defarofilesult">Leg uw vinger op de scanner.</option>
                    <option value="mute">Niet storen a.u.b.</option>
                    <option value="later">Kom later terug</option>
                    <option value="johova">Geen Johova's</option>
                  @break
                  @case("mute")
                    <option value="mute" selected>Niet storen a.u.b.</option>
                    <option value="default">Leg uw vinger op de scanner.</option>
                    <option value="away" >Ik ben niet thuis.</option>
                    <option value="later">Kom later terug</option>
                    <option value="johova">Geen Johova's</option>
                  @break
                  @case("later")
                    <option value="later" selected>Kom later terug</option>
                    <option value="mute">Niet storen a.u.b.</option>
                    <option value="default">Leg uw vinger op de scanner.</option>
                    <option value="away" >Ik ben niet thuis.</option>
                    <option value="johova">Geen Johova's</option>
                  @break
                  @case("johova")
                    <option value="johova" selected>Geen Johova's</option>
                    <option value="later">Kom later terug</option>
                    <option value="mute">Niet storen a.u.b.</option>
                    <option value="default">Leg uw vinger op de scanner.</option>
                    <option value="away" >Ik ben niet thuis.</option>
                  @break
                  @default
                    <option value="default" selected>Leg uw vinger op de scanner.</option>
                    <option value="johova">Geen Johova's</option>
                    <option value="later">Kom later terug</option>
                    <option value="mute">Niet storen a.u.b.</option>
                    <option value="away" >Ik ben niet thuis.</option>
                @endswitch
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 settings__submit">
        <button class="back confirm" type="submit" name="button">Wijzigingen Opslaan</button>
      </div>
    </div>
  </div>
</form>
@endsection
