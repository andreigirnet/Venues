@extends('layouts.front')

@section('content')
    <!--section for New venues for-->
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="site-section-title">
                        <h2>Venues for {{$event_type->name}}</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
            @foreach($venues as $venue)
                    <div class="col-md-6 col-lg-4 mb-4">
                       <a href="" class="prop-entry d-block">
                            <figure>
                                <img src="{{asset('storage/'. $venue->picture)}}" alt="" class="img-fluid" style="height: 233px; width: fit-content; ">
                            </figure>
                            <div class="prop-text">
                                <div class="inner">
                                    <span class="price rounded">${{$venue->price_per_hour}} / hour</span>
                                    <h3 class="title">{{$venue->name}}</h3>
                                    <p class="location">{{$venue->address}}</p>
                                </div>
                                <div class="prop-more-info">
                                    <div class="inner d-flex">
                                        <div class="col">
                                            <span>Event Types:</span>
                                            <strong style="font-size: 8px">{{implode(', ',$venue->event_types()->pluck('name')->toArray())}}</strong>
                                        </div>
                                        <div class="col">
                                            <span>Maximum number of people:</span>
                                            <strong>{{$venue->people_minimum}} - {{$venue->people_maximum}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            @endforeach
            </div>
            <!--Pagination links-->
            <div style="display: flex; justify-content: center">
                <span>
            {{$venues->links("pagination::bootstrap-4")}}
                </span>
            </div>
        </div>
    </div>
@endsection
