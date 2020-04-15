@extends('layouts.app')

@section('content')

<a href="home" class="back cancel">Terug naar Dashboard</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Mijn Geschiedenis</div>
              <div class="card-body">
                @foreach($history as $his)
                  <p>{{$his->created_at}} - {{$his->contact_name}}</p>
                @endforeach
                <a href="history/addcontact" class="card-header">Klik hier om profiel aan te maken</a>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
