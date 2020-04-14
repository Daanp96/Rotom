@extends('layouts.app')
@section('content')


<a class="back"></a>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="profile">
        <form class="addProfile" action="update/{{$profile->name}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="profile__banner">
            <input id="js--bannerInput" type="file" name="banner" class="image_upload" accept="image/*"/>
            <img src="{{URL::asset($profile->banner)}}" class="profile__banner__img"  alt="">
          </div>
            <div class="profile__photo">
              <input id="js--avatarInput" type="file" name="avatar" class="image_upload" accept="image/*"/>
              <img src="{{URL::asset($profile->avatar)}}" alt="placeholder profile picture" class="profile__photo__img">
            </div>
            <div class="profile__main">
              <div class="profile__main__name">
                <input type="text" name="name" class="profile__main__name__form" value="{{$profile->name}}">
                <label for="name" class="profile__main__name__label">Naam</label>
              </div>
              <div class="profile__main__options">
                <div class="profile__main__options__option">
                  <label for="door_access" class="profile__main__options__option__text">Deurtoegang</label>
                  <select class="profile__main__options__option__select" name="door_access">
                    @if($profile->door_access == 'custom')
                      <option value="custom" selected>Custom</option>
                      <option value="none">None</option>
                    @else
                      <option value="none" selected>None</option>
                      <option value="custom">Custom</option>
                    @endif
                  </select>
                </div>
                <div class="profile__main__options__option">
                  <label for="ringtone" class="profile__main__options__option__text">Ringtone</label>
                  <select class="profile__main__options__option__select" name="ringtone">
                      @foreach($ringtones as $ringtone)
                        @if($profile->ringtone == $ringtone->title)
                          <option value="{{$ringtone->title}}" selected>{{$ringtone->title}}</option>
                        @else
                          <option value="{{$ringtone->title}}">{{$ringtone->title}}</option>
                        @endif
                      @endforeach
                  </select>
                </div>
                <div class="profile__main__options__option">
                  <label for="priority" class="profile__main__options__option__text">Hogere prioriteit</label>
                  <select class="profile__main__options__option__select" name="priority">
                    @if($profile->priority == '1')
                      <option value="1" selected>Aan</option>
                      <option value="0">Uit</option>
                    @else
                      <option value="0" selected>Uit</option>
                      <option value="1" >Aan</option>
                    @endif
                  </select>
                </div>
              </div>
              <div class="edit">
                <a href="/profiles/{{$profile->name}}" class="edit__button cancel">Cancel</a>
                <button class="edit__button confirm" type="submit" name="button">Opslaan</button>
              </div>
            </div>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
</div>


@endsection
