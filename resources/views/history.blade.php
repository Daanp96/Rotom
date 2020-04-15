@extends('layouts.app')

@section('content')

<a href="home" class="back cancel">Terug naar Dashboard</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Mijn Geschiedenis</div>
              <div class="card-body">
                <p>04:20 20/04/2020 - Onbekend Persoon </p>
                <a href="history/addcontact" class="card-header">Klik hier om profiel aan te maken</a>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
