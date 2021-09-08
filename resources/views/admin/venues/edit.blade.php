@extends('layouts.admin')
@section('content')

    <h2> Edit a Venue</h2>
    <div style="width:1000px; margin: 20px auto 0 auto">
        <form action="{{route('venues.update', $venue->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="exampleInputEmail1">Venue Name</label>
                <input name="name" type="name" value="{{$venue->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Venue name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Venue slug</label>
                <input name="slug" type="name" value="{{$venue->slug}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Slug">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input name="address" type="name" value="{{$venue->address}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="address">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Minimum People</label>
                <input name="people_minimum" name="people_minimum" value="{{$venue->people_minimum}}" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Minimum People">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Maximum People</label>
                <input name="people_maximum" name="people_maximum" value="{{$venue->people_maximum}}" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Maximum people">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Features</label>
                <input name="features" type="name" name="features" value="{{$venue->features}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Maximum people">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price per Hour $</label>
                <input name="price_per_hour" type="name" class="form-control" value="{{$venue->price_per_hour}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price per Hour">
            </div>

            <label for="select">Choose a Location</label>
            <Select id="select" name="location_id" style=" width: 1000px;border-radius: 3px;height: 33px; background-color: aliceblue; margin-top: 5px; margin-bottom: 18px;">
                @foreach($locations as $location)
                    <option value="{{($location->id)}}">{{$location->name}}</option>
                @endforeach
            </Select>

            <label for="select">Event type</label>
            <Select id="select" name="event_id" style=" width: 1000px;border-radius: 3px;height: 33px; background-color: aliceblue; margin-top: 5px; margin-bottom: 18px;">
                @foreach($event_types as $event)
                    <option value="{{$event->id}}">{{$event->name}}</option>
                @endforeach
            </Select>
            <label for="select">Is featured</label>
            <Select id="select" name="is_featured" style=" width: 1000px;border-radius: 3px;height: 33px; background-color: aliceblue; margin-top: 5px; margin-bottom: 18px;">
                <option value="0" >Not Featured</option>
                <option value="1" >Is Featured</option>
            </Select>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <h1 class="h2 mb-4">Description</h1>
                        <label>Describe the venue</label>
                        <div class="form-group">
                            <textarea id="editor" name="description" style="width: 1000px; height: 500px;">{{$venue->description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <label for="picture">Upload a picture</label>
            <small>350X233</small>
            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file" id="picture">
                    <input type="file" name="picture" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>

            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload a Big Image for slider(Only if it is featured)</span>
                </div>
                <div class="custom-file" id="big_picture">
                    <input type="file" name="big_picture" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>

            <button type="submit" class="btn btn-primary mb-4" style="margin-top: 10px;">Submit</button>
        </form>
    </div>

@stop
