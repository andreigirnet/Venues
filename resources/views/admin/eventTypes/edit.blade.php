@extends('layouts.admin')
@section('content')

    <h2> Edit a event-type</h2>
    <div style="width:1000px; margin: 20px auto 0 auto">
        <form action="{{route('event-types.update', $eventType->id)}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>

                <input name="name" type="name" value="{{$eventType->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input name="slug" type="name" value="{{$eventType->slug}}" class="form-control" id="exampleInputPassword1" placeholder="Slug">
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
        </form>
    </div>
</script>
@stop
