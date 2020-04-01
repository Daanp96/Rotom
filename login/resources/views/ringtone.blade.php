@extends('layouts.app')

@section('content')

<a href="home" class="back"><</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mijn Ringtones</div>

                <div class="card-body">
                  <form class="" action="/ringtone/add" method="POST">
                    @csrf

                    <label for="file">Kies een audio bestand:</label>
                    <input type="file" name="file" value="">

                    <label for="name">Geef de ringtone een naam:</label>
                    <input type="text" name="name" value="">

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
