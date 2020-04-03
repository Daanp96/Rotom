@extends('layouts.app')

@section('content')

<a href="home" class="back">< Terug naar Dashboard</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Mijn Contacten</div>
              <div class="card-body">

                @foreach($contact as $contact)
                    <p><a href="/profiles/{{$contact->name}}">{{$contact->name}}</a></p>
                @endforeach
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
