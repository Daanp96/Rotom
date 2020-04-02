@extends('login.layout')
@section('content')
    <div class="profile">
        <div class="profile__banner"></div>
        <div class="profile__photo">
            <img src="{{URL::asset("img/pfp_placeholder.png")}}" alt="placeholder profile picture" class="profile__photo__img">
        </div>
        <div class="profile__main">
            <form action="/testprofile/store" method="post">
                @csrf
                <div class="profile__main__top-bar"></div>
                <div class="profile__main__name">
                    <input type="text" name="name" class="profile__main__name__form">
                    <label for="name" class="profile__main__name__label">name</label>
                </div>
                <div class="profile__main__options">
                    <div class="profile__main__options__option">
                        <p class="profile__main__options__option__text">Deurtoegang</p>
                        <select class="door_access_select" name="door_access">
                            <option value="none" selected>None</option>
                            <option value="custom">Custom</option>
                        </select>
{{--                        <p class="profile__main__options__option__select">custom</p>--}}
                    </div>
                    <div class="profile__main__options__option">
                        <p class="profile__main__options__option__text">ringtone</p>
                        <select class="ringtone_select" name="ringtone">
                            @foreach($ringtones as $ringtone)
                                <option value="{{$ringtone->title}}">{{$ringtone->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="profile__main__options__option">
                        <p class="profile__main__options__option__text">hogere prioriteit</p>
                        <select class="priority_select" name="priority">
                            <option value="0" selected>Uit</option>
                            <option value="1">Aan</option>
                        </select>
{{--                        <p class="profile__main__options__option__select">uit</p>--}}
                    </div>
                </div>
                <button type="submit" name="button">Maak contact aan</button>
            </form>
        </div>
    </div>
@endsection
