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
                    <a href="{{route('venues.edit', $venue)}}"><i class="fas fa-edit"></i></a>
                    <a href="{{route('venues.show', $venue)}}"><i class="fas fa-eye"></i></a>
                    <form action="{{route('venues.destroy',[$venue->id])}}" method="POST">
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
        <div style="background-color:#34adda; width:100px; height: 50px; display: flex; align-items: center; justify-content: center"><a href="{{route('venues.create')}}" style="color:white;  cursor:pointer; text-decoration: none;">Create a Venue</a></div>
    </div>
@endsection
