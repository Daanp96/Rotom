@extends('layout')
@section('content')
    <div class="profile">
        <div class="profile__banner"></div>
        <div class="profile__photo">
            <img src="{{URL::asset("img/pfp_placeholder.png")}}" alt="placeholder profile picture" class="profile__photo__img">
        </div>
        <div class="profile__main">
            <div class="profile__main__top-bar">

            </div>
            <div class="profile__main__name">
                <input type="text" name="name" class="profile__main__name__form">
                <label for="name" class="profile__main__name__label">name</label>
            </div>
            <div class="profile__main__options">
                <div class="profile__main__options__option">
                    <p class="profile__main__options__option__text">deurtoegang</p>
                    <p class="profile__main__options__option__select">custom</p>
                </div>
                <div class="profile__main__options__option">
                    <p class="profile__main__options__option__text">ringtone</p>
                    <p class="profile__main__options__option__select">megalovania</p>
                </div>
                <div class="profile__main__options__option">
                    <p class="profile__main__options__option__text">hogere prioriteit</p>
                    <p class="profile__main__options__option__select">uit</p>
                </div>
            </div>
        </div>
    </div>
@endsection
