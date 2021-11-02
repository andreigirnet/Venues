@extends('layouts.front')

@section('content')
    <div style="display: flex; margin-bottom: 300px;">
        <div style="width: 20%; margin-top: 30px;">
            <ul class="list-group">
                <li class="list-group-item" >{{auth()->user()->name}}'s dashboard</li>
                <li class="list-group-item list-group-item-success" style="cursor: pointer"><a style="color: #0b0b0b" href="{{route('user.create')}}">List a new Venue</a></li>
                <li class="list-group-item list-group-item-warning" style="cursor: pointer"><a style="color: #0b0b0b" href="{{route('user.index')}}">Venues listed</a></li>
                <li class="list-group-item list-group-item-info" style="cursor: pointer"><a style="color: #0b0b0b" href="{{route('user.profile.edit', $auth_user)}}">Edit Profile</a></li>
            </ul>
        </div>
        <!--right wing table with the output-->
        <div style="width: 80%; margin: 30px 30px 30px 30px; ">
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
                    <th scope="col">Venue Name</th>
                    <th scope="col">Venue People minimum</th>
                    <th scope="col">Venue People maximum</th>
                    <th scope="col">Price per hour</th>
                    <th scope="col">Event Types</th>
                    <th scope="col">Location</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($venues as $venue)
                    <tr>
                        <th scope="row">{{$venue->id}}</th>
                        <td>{{$venue->name}}</td>
                        <td>{{$venue->people_minimum}}</td>
                        <td>{{$venue->people_maximum}}</td>
                        <td>{{$venue->price_per_hour}} $</td>
                        @if($venue->event_types)
                            <td>{{$venue->event_types->pluck('name')->implode(', ')}}</td>
                        @else
                        @endif
                        @if($venue->location)
                            <td>{{$venue->location->name}}</td>
                        @else
                            <td>No location</td>
                        @endif
                        <td style="display:flex; justify-content: space-around">
                            <a href="{{route('venues.edit', $venue)}}"><img title="Edit the record" src="https://img.icons8.com/color/48/000000/edit--v1.png"/></a>
                            <a href="{{route('venues.show', $venue)}}"><img title="View the record" src="https://img.icons8.com/color/48/000000/visible--v1.png"/></a>
                            <form action="{{route('venues.destroy',[$venue->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border:none; background: none; color: red" href=""><img style="cursor: pointer" title="Delete the record" src="https://img.icons8.com/color/48/000000/delete-forever.png"/></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div style="margin-top: 30px;">
                <div style="background-color:#34adda; width:120px; height: 50px; display: flex; align-items: center; justify-content: center"><a href="{{route('user.create')}}" style="color:white;  cursor:pointer; text-decoration: none;">List a Venue</a></div>
            </div>
        </div>
    </div>

@endsection
