@extends('layouts.app')
@section('content')

<a href="/history" class="cancel">Terug naar Mijn Geschiedenis</a>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="profile">
        <form class="addProfile" action="addprofile/store" method="post" enctype="multipart/form-data">
            @csrf
          <div class="profile__banner">
            <input id="js--bannerInput" type="file" name="banner" class="image_upload" accept="image/*"/>
            <img id="js--banner" src="{{URL::asset("img/banner_placeholder.jpg")}}" class="profile__banner__img"  alt="">
          </div>
            <div class="profile__photo">
                <input id="js--avatarInput" type="file" name="avatar" class="image_upload" accept="image/*"/>
                <img id="js--avatar" src="{{URL::asset("img/pfp_placeholder.png")}}" alt="" class="profile__photo__img">  
            </div>
            <div class="profile__main">
                    <!-- <input class="add__name" type="file" name="profile"> -->
              <div class="profile__main__name">
                  <input type="text" name="name" class="profile__main__name__form">
                  <label for="name" class="profile__main__name__label">Naam</label>
              </div>
              <div class="profile__main__options">
                  <div class="profile__main__options__option">
                      <label for="door_access" class="profile__main__options__option__text">Deurtoegang</label>
                      <select class="profile__main__options__option__select" name="door_access">
                          <option value="none" selected>None</option>
                          <option value="custom">Custom</option>
                      </select>
  <!--                        <p class="profile__main__options__option__select">custom</p> -->
                  </div>
                  <div class="profile__main__options__option">
                      <label for="ringtone" class="profile__main__options__option__text">Ringtone</label>
                      <select class="profile__main__options__option__select" name="ringtone">
                          @foreach($ringtones as $ringtone)
                              <option value="{{$ringtone->title}}">{{$ringtone->title}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="profile__main__options__option">
                      <label for="priority" class="profile__main__options__option__text">Hogere prioriteit</label>
                      <select class="profile__main__options__option__select" name="priority">
                          <option value="0" selected>Uit</option>
                          <option value="1">Aan</option>
                      </select>
  <!--                      <p class="profile__main__options__option__select">uit</p> -->
                  </div>
              </div>
              <button class="profile__main__submit confirm" type="submit" name="button">Maak contact aan</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection
