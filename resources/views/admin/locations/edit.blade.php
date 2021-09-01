@extends('layouts.admin')
@section('content')
    <h2> Edit a location</h2>
    <div style="width:1000px; margin: 20px auto 0 auto">
        <form action="{{route('locations.update',$location->id)}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>

                <input name="name" type="name"value="{{$location->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Slug</label>
                <input name="slug" value="{{$location->slug}}" type="name" class="form-control" id="exampleInputPassword1" placeholder="Slug">
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="picture" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <small>Photo should be 200x200</small><br>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
        </form>
    </div>
@stop
