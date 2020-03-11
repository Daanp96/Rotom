<!DOCTYPE html>
<html>
    <head>
        <title>Simple Login System in Laravel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href={{URL::asset('css/main.css')}}>
    </head>
    <body>
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
    </body>
</html>

