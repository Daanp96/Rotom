@extends('layouts.app')
@section('content')


<a class="back"></a>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="contact">

        <!-- FORM VOOR AANPASSEN CONTACT -->
        <form class="addContact" action="update/{{$contact->name}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <!-- BANNER -->
          <div class="contact__banner">
            <input id="js--bannerInput" type="file" name="banner" class="image_upload" accept="image/*"/>
            <img id="js--banner" src="{{URL::asset($contact->banner)}}" class="contact__banner__img"  alt="banner">
          </div>

          <!-- AVATAR -->
          <div class="contact__photo">
            <input id="js--avatarInput" type="file" name="avatar" class="image_upload" accept="image/*"/>
            <img id="js--avatar" src="{{URL::asset($contact->avatar)}}" alt="" class="contact__photo__img">
          </div>

          <div class="contact__main">

            <!-- NAAM -->
            <div class="contact__main__name">
              <input type="text" name="name" class="contact__main__name__form" value="{{$contact->name}}">
              <label for="name" class="contact__main__name__label">Naam</label>
            </div>


            <div class="contact__main__options">
              <!-- DEURTOEGANG -->
              <div class="contact__main__options__option">
                <label for="door_access" class="contact__main__options__option__text">Deurtoegang</label>
                <select class="contact__main__options__option__select" name="door_access">
                  @if($contact->door_access == 'custom')
                    <option value="custom" selected>Custom</option>
                    <option value="none">None</option>
                  @else
                    <option value="none" selected>None</option>
                    <option value="custom">Custom</option>
                  @endif
                </select>
              </div>

              <!-- RINGTONE -->
              <div class="contact__main__options__option">
                <label for="ringtone" class="contact__main__options__option__text">Ringtone</label>
                <select class="contact__main__options__option__select" name="ringtone">
                    @foreach($ringtones as $ringtone)
                      @if($contact->ringtone == $ringtone->title)
                        <option value="{{$ringtone->title}}" selected>{{$ringtone->title}}</option>
                      @else
                        <option value="{{$ringtone->title}}">{{$ringtone->title}}</option>
                      @endif
                    @endforeach
                </select>
              </div>

              <!-- HOGERE PRIORITEIT -->
              <div class="contact__main__options__option">
                <label for="priority" class="contact__main__options__option__text">Hogere prioriteit</label>
                <select class="contact__main__options__option__select" name="priority">
                  @if($contact->priority == '1')
                    <option value="1" selected>Aan</option>
                    <option value="0">Uit</option>
                  @else
                    <option value="0" selected>Uit</option>
                    <option value="1" >Aan</option>
                  @endif
                </select>
              </div>
            </div>

            <!-- SUBMIT OF CANCEL -->
            <div class="edit">
              <a href="/contacts/{{$contact->name}}" class="edit__button cancel">Cancel</a>
              <button class="edit__button confirm" type="submit" name="button">Opslaan</button>
            </div>
          </div>
        </form>
      </div>
      <form class="fingerprint__form" action="/contacts/updatecontact/ringbell/1" method="post">
        @csrf
        @method('PUT')
        <p class="fingerprint__text">Klik hier om je vingerafdruk te scannen...</p>
        <button class="fingerprint__button" type="submit" name="is_pressed" value="1"></button>
      </form>
    </div>
  </div>
</div>
@endsection
