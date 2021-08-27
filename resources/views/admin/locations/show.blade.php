@extends('layouts.admin')
@section('content')

        <div class="continer-fluid">
            <div class="mt-2" style="width: 100%; display:flex; justify-content: center" ><h2 style="color: #000000; font-family: Tahoma">Location:  <h2 style="color: #2b6149">{{$location->name}}</h2></h2></div>
            @if($location->picture)
            <div class="mt-1" style="display: flex; justify-content: center" ><img style="width: 800px; height: 600px;" src="{{asset('storage/'.$location->picture)}}" alt=""></div>
            @endif
        </div>

@endsection
