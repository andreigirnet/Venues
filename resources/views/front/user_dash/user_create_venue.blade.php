@extends('layouts.front')

@section('content')
    <div style="display: flex; justify-content: center; margin-top: 30px;">
    <h2> List a Venue</h2>
    </div>
    <div style="width:1000px; margin: 20px auto 90px auto" >
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Venue Name</label>
                <input name="name" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Venue name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Venue slug</label>
                <input name="slug" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Slug">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input name="address" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="address">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Minimum People</label>
                <input name="people_minimum" name="people_minimum" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Minimum People">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Maximum People</label>
                <input name="people_maximum" name="people_maximum" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Maximum people">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Features</label>
                <input name="features" type="name" name="features" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Maximum people">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price per Hour $</label>
                <input name="price_per_hour" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Price per Hour">
            </div>

            <label for="select">Choose a Location</label>
            <Select id="select" name="location_id" style=" width: 1000px;border-radius: 3px;height: 33px; background-color: aliceblue; margin-top: 5px; margin-bottom: 18px;">
                @foreach($locations as $location)
                    <option value="{{$location->id}}" >{{$location->name}}</option>
                @endforeach
            </Select>

            <label for="select">Event type</label>
            <Select id="select" name="event_id" style=" width: 1000px;border-radius: 3px;height: 33px; background-color: aliceblue; margin-top: 5px; margin-bottom: 18px;">
                @foreach($event_types as $event)
                    <option value="{{$event->id}}" >{{$event->name}}</option>
                @endforeach
            </Select>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <h1 class="h2 mb-4">Description</h1>
                        <label>Describe the venue</label>
                        <div class="form-group">
                            <textarea id="editor" name="description" style="width: 1000px; height: 500px;"></textarea>
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



            <button type="submit" class="btn btn-primary mb-4" style="margin-top: 10px;">Submit</button>
        </form>
    </div>

@endsection



