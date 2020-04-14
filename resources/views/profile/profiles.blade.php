@extends('layouts.app')

@section('content')

<a href="home" class="cancel">Terug naar Dashboard</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Mijn Contacten</div>
              <div class="card-body">

                @foreach($contact as $contact)
                <div class="contact">
                  <div class="contact__photo">
                      <img src="{{URL::asset($contact->avatar)}}" alt="placeholder profile picture" class="contact__photo__img">
                  </div>
                    <p class="contact__name">
                      <a href="/profiles/{{$contact->name}}">{{$contact->name}}</a>
                    </p>
                </div>
                @endforeach
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
