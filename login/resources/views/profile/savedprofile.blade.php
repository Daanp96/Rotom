@extends('layouts.layout')
@section('content')
    <div class="profile">
        <div class="profile__banner"></div>
        <div class="profile__photo">
            <img src="{{URL::asset("img/pfp_placeholder.png")}}" alt="placeholder profile picture" class="profile__photo__img">
        </div>
        <div class="profile__main">
            <div class="profile__main__top-bar"></div>
            <div class="profile__main__name">
                <p class="profile__main__options__option__text">Naam: {{$profile->name}}</p>
            </div>
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
@endsection
