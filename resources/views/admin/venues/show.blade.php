@extends('layouts.admin')
@section('content')
    <div class="continer-fluid">
        <div class="mt-2" style="width: 100%; display:flex; justify-content: center" ><h2 style="color: #000000; font-family: Tahoma">Venue name:  <h2 style="color: #2b6149">{{$venue->name}}</h2></h2></div>
        @if($venue->picture)
            <div class="mt-1" style="display: flex; justify-content: center" ><img style="width: 800px; height: 600px;" src="{{asset('storage/'.$venue->picture)}}" alt=""></div>
        @endif
        <div class="w-400 h-100 bg-gray-300">
            <table class="table mt-2">
                <thead class="thead-dark">
                <tr>
                <th>Venue Name</th>
                <th>Venue address</th>
                <th>People minimum</th>
                <th>People Maximum</th>
                <th>Features</th>
                <th>Price per Hour</th>
                <th>Location</th>
                <th>Is featured</th>
                </tr>
            </thead>
                <tbody>
                    <td>{{$venue->name}}</td>
                    <td>{{$venue->address}}</td>
                    <td>{{$venue->people_minimum}}</td>
                    <td>{{$venue->people_maximum}}</td>
                    <td>{{$venue->features}}</td>
                    <td>{{$venue->price_per_hour}}</td>
                    <td>{{$venue->location->name}}</td>
                    <td>{{$venue->is_featured}}</td>
                </tbody>

            </table>
        </div>
    </div>
@endsection
