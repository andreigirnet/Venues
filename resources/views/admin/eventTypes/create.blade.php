@extends('layouts.admin')
@section('content')

    <h2> Create a event-type</h2>
    <div style="width:1000px; margin: 20px auto 0 auto">
        <form action="{{route('event-types.store')}}" method="POST" >
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>

                <input name="name" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input name="slug" type="name" class="form-control" id="exampleInputPassword1" placeholder="Slug">
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
        </form>
    </div>
@endsection
