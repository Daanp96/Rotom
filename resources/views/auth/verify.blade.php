@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email Bevestigen') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Rotom heeft een verificatie link gestuurd naar jou email adres!') }}
                        </div>
                    @endif

                    {{ __('Voordat u verder gaat, controleer eerst uw email voor een verificatie link.') }}
                    {{ __('Als u deze mail niet ontvangen heeft') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline confirm">{{ __('klik dan hier om een nieuwe aan te vragen.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
