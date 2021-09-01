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
            <th scope="col">Location Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($eventTypes as $event)
            <tr>
                <th scope="row">{{$event->id}}</th>
                <td>{{$event->name}}</td>
                <td>{{$event->slug}}</td>
                <td style="display:flex; justify-content: space-around">
                    <a href="{{route('event-types.edit', $event)}}"><i class="fas fa-edit"></i></a>
                    <a href="{{route('event-types.show', $event)}}"><i class="fas fa-eye"></i></a>
                    <form action="{{route('event-types.destroy',[$event->id])}}" method="POST">
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
        <div style="background-color:#34adda; cursor: pointer; width:130px; height: 50px; display: flex; align-items: center; justify-content: center"><a href="{{route('admin.event-types.create')}}" style="color:white;  cursor:pointer; text-decoration: none;">Create a Event-type</a></div>
    </div>
@endsection
