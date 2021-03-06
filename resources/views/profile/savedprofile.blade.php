@extends('layouts.app')
@section('content')


<a href="/profiles" class="back cancel">Terug naar Mijn Contacten</a>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="profile">
        <div class="profile__banner">
          <img src="{{URL::asset($profile->banner)}}" class="profile__banner__img"  alt="">
          <a href="/profiles/updateProfile/{{$profile->name}}" class="profile__edit">
            <img src="{{URL::asset("img/edit.png")}}" class="profile__edit__img"  alt="">
          </a>
        </div>
        <div class="profile__photo">
            <img src="{{URL::asset($profile->avatar)}}" alt="placeholder profile picture" class="profile__photo__img">
        </div>
        <div class="profile__main">
          <h1 class="profile__main__name">{{$profile->name}}</h1>

          <div class="profile__main__options">
              <div class="profile__main__options__option">
                  <p class="profile__main__options__option__text">Deurtoegang</p>
                  <p class="profile__main__options__option__select">{{$profile->door_access}}</p>
              </div>
              <div class="profile__main__options__option">
                  <p class="profile__main__options__option__text">Ringtone</p>
                  <p class="profile__main__options__option__select">{{$profile->ringtone}}</p>
              </div>
              <div class="profile__main__options__option">
                  <p class="profile__main__options__option__text">Hogere prioriteit</p>
                  @if($profile->priority == '1')
                      <p class="profile__main__options__option__select">Aan</p>
                  @else
                      <p class="profile__main__options__option__select">Uit</p>
                  @endif
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>







@endsection
