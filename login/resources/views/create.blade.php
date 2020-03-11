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
    <h3>Rotom User Create</h3>

    <form method="post" action="/checkcreate/">
        @csrf
        <div class="form-group">
            <label>Enter Name</label>
            <input type="text" name="name" class="form-control" />
        </div>
        <div class="form-group">
            <label>Enter Email</label>
            <input type="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label>Enter Password</label>
            <input type="password" name="password" class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary" value="Create" />
        </div>
    </form>
</div>
</body>
</html>

