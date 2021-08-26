@extends('layouts.admin')
@section('content')
    <h2> Create a Role</h2>
    <div style="width:1000px; margin: 20px auto 0 auto">
        <form action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>

                <input name="name" type="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <label for="select">Permissions for this role</label>
            <Select id="select" name="permission_id" style=" width: 1000px;border-radius: 3px;height: 33px; background-color: aliceblue; margin-top: 5px; margin-bottom: 18px;">
                @foreach($permissions as $permission)
                    <option value="{{$permission->id}}" >{{$permission->title}}</option>
                @endforeach
            </Select>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>


            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
        </form>
    </div>
@endsection
