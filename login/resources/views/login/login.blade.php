@extends('login.layout')
@section('content')

    <div class="container box">
        <h3>Welkom!</h3>

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ url('/main/checklogin') }}">
                @csrf
                <div class="form-group">
                    <label>Enter Name</label>
                    <input type="text" name="name" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="password" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary" value="Login" />
                </div>
            </form>
            <div class="form-group">
                <a href="/create">Create User</a>
            </div>
        </div>
@endsection
