@extends('layout')
@section('content')
        <div class="container box">
            <h3>Simple Login System in Laravel</h3>
            @if(isset(Auth::user()->name))
                <div class="alert alert-danger success-block">
                    <strong>Welcome {{ Auth::user()->name }}</strong>
                    <br />
                    <a href="{{ url('/main/logout') }}">Logout</a>
                </div>
            @endif
        </div>
@endsection
