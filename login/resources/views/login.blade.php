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
            <h3>Rotom Login</h3>
            <img src="img/rotom_logo_dark.png" alt="rotom-logo" id="rotom-logo">
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
                {{ csrf_field() }}
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
    </body>
</html>

