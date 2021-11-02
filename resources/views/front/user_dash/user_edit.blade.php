@extends('layouts.front')

@section('content')
    <div style="width:1000px; margin: 20px auto 0 auto">
        <h2>Edit your Profile</h2>
        <form action="{{route('user.profile.update',[$user->id])}}" style="margin: 30px 0 300px 0" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">

                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputPassword1" value="{{$user->email}}">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Update</button>

        </form>
    </div>
@endsection
