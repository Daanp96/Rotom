@extends('layouts.app')
@section('content')


<a href="/contacts" class="back cancel">Terug naar Mijn Contacten</a>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="contact">

        <!-- BANNER -->
        <div class="contact__banner">
          <img src="{{URL::asset($contact->banner)}}" class="contact__banner__img"  alt="">

          <!-- EDIT KNOP -->
          <a href="/contacts/updatecontact/{{$contact->name}}" class="contact__edit">
            <img src="{{URL::asset("img/edit.png")}}" class="contact__edit__img"  alt="">
          </a>
        </div>

        <!-- AVATAR -->
        <div class="contact__photo">
            <img src="{{URL::asset($contact->avatar)}}" alt="" class="contact__photo__img">
        </div>

        <div class="contact__main">
          <!-- NAAM -->
          <h1 class="contact__main__name">{{$contact->name}}</h1>

          <div class="contact__main__options">

            <!-- DEURTOEGANG -->
            <div class="contact__main__options__option">
                <p class="contact__main__options__option__text">Deurtoegang</p>
                <p class="contact__main__options__option__select">{{$contact->door_access}}</p>
            </div>

            <!-- RINGTONE -->
            <div class="contact__main__options__option">
                <p class="contact__main__options__option__text">Ringtone</p>
                <p class="contact__main__options__option__select">{{$contact->ringtone}}</p>
            </div>

            <!-- HOGERE PRIORITEIT -->
            <div class="contact__main__options__option">
                <p class="contact__main__options__option__text">Hogere prioriteit</p>
                @if($contact->priority == '1')
                    <p class="contact__main__options__option__select">Aan</p>
                @else
                    <p class="contact__main__options__option__select">Uit</p>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
