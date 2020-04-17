@extends('layouts.app')
@section('content')

<a href="/contacts" class="back cancel">Terug naar Mijn Contacten</a>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="contact">

        <!-- FORM VOOR OPSLAAN CONTACT -->
        <form class="addContact" action="addcontact/store" method="post" enctype="multipart/form-data">
            @csrf

          <!-- BANNER -->
          <div class="contact__banner">
            <input id="js--bannerInput" type="file" name="banner" class="image_upload" accept="image/*"/>
            <img id="js--banner" src="{{URL::asset("img/banner_placeholder.jpg")}}" class="contact__banner__img"  alt="">
          </div>

          <!-- AVATAR -->
          <div class="contact__photo">
                <input id="js--avatarInput" type="file" name="avatar" class="image_upload" accept="image/*"/>
                <img id="js--avatar" src="{{URL::asset("img/pfp_placeholder.png")}}" alt="" class="contact__photo__img">
          </div>

          <div class="contact__main">

            <!-- NAAM -->
            <div class="contact__main__name">
                <input type="text" name="name" class="contact__main__name__form">
                <label for="name" class="contact__main__name__label">Naam</label>
            </div>


            <div class="contact__main__options">
                <!-- DEURTOEGANG -->
                <div class="contact__main__options__option">
                    <label for="door_access" class="contact__main__options__option__text">Deurtoegang</label>
                    <select class="contact__main__options__option__select" name="door_access">
                        <option value="none" selected>None</option>
                        <option value="custom">Openen</option>
                    </select>
                </div>

                <!-- RINGTONE -->
                <div class="contact__main__options__option">
                    <label for="ringtone" class="contact__main__options__option__text">Ringtone</label>
                    <select class="contact__main__options__option__select" name="ringtone">
                        @foreach($ringtones as $ringtone)
                            <option value="{{$ringtone->title}}">{{$ringtone->title}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- HOGE PRIORITEIT -->
                <div class="contact__main__options__option">
                    <label for="priority" class="contact__main__options__option__text">Hogere prioriteit</label>
                    <select class="contact__main__options__option__select" name="priority">
                        <option value="0" selected>Uit</option>
                        <option value="1">Aan</option>
                    </select>
                </div>
            </div>

            <!-- SUBMIT -->
            <button class="contact__main__submit confirm" type="submit" name="button">Maak contact aan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
