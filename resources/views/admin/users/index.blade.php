@extends('layouts.admin')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->get('success'))
        <div style="color:green; background-color:#bcebbc; height: 50px; width: 100%; display:flex; align-items: center;">{{session()->get('success')}}</div>
        @endif
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Roles</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->roles->pluck('title')->implode(', ')}}</td>
                <td style="display:flex">
                    <a href="{{route('users.edit', $user)}}"><i class="fas fa-edit"></i></a>
                    <form action="{{route('users.destroy',[$user->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" style="border:none; background: none; color: red" href=""><i class="fas fa-trash-alt" style="margin-left: 5px;"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    <div style="margin-top: 30px;">
        <div style="background-color:#34adda; width:100px; height: 50px; display: flex; align-items: center; justify-content: center"><a href="{{route('users.create')}}" style="color:white;  cursor:pointer; text-decoration: none;">Create a User</a></div>
    </div>

@endsection
