@extends('layouts.admin')
@section('content')

    <h2 style="margin-top: 10px;"> Create a Permission</h2>
    <div style="width:1000px; margin: 20px auto 0 auto">
        <form action="{{route('permissions.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Permission Name</label>

                <input name="title" type="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>


            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
        </form>
    </div>
@endsection
