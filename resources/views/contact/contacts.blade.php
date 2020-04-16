@extends('layouts.app')

@section('content')

<a href="home" class="back cancel">Terug naar Dashboard</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Mijn Contacten</div>
              <div class="card-body">

                <!-- LIJST VAN CONTACTEN -->
                @foreach($contact as $contact)
                <div class="list">
                  <div class="list__photo">
                      <img src="{{URL::asset($contact->avatar)}}" alt="" class="list__photo__img">
                  </div>
                    <p class="list__name">
                      <a href="/contacts/{{$contact->name}}">{{$contact->name}}</a>
                    </p>
                </div>
                @endforeach
                <a href="/contacts/addcontact" class="card-header" id="contact__button">Klik hier om profiel aan te maken</a>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
