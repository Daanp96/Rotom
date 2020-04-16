@extends('layouts.app')

@section('content')

<a href="home" class="back cancel">Terug naar Dashboard</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Mijn Geschiedenis</div>
              <div class="card-body">

                  @foreach($history->reverse()->take(25) as $h)
                  <div class="history">
                    <h3 class="history__name">{{ $h->contact_name }}</h3>
                    <p class="history__date">{{ $h->created_at }}</p>
                  </div>
                  @endforeach

              </div>
          </div>
      </div>
  </div>
</div>
@endsection
