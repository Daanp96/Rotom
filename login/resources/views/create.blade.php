@extends('layout')
@section('content')
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
@endsection
