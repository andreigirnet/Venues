@extends('layouts.admin')
@section('content')
    <h2> Create a user</h2>
    <div style="width:1000px; margin: 20px auto 0 auto">
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>

            <input name="name" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <label for="select">Role</label>
            <Select id="select" name="role_id" style=" width: 1000px;border-radius: 3px;height: 33px; background-color: aliceblue; margin-top: 5px; margin-bottom: 18px;">
                @foreach($roles as $role)
                <option value="{{$role->id}}" >{{$role->title}}</option>
                @endforeach
            </Select>
        <label for="select">Is Admin Access</label>
        <Select id="select" name="is_admin" style=" width: 1000px;border-radius: 3px;height: 33px; background-color: aliceblue; margin-top: 5px; margin-bottom: 18px;">
                <option value="0" >Simple</option>
                <option value="1" >Admin Access</option>
        </Select>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>


        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
    </form>
    </div>
@endsection
