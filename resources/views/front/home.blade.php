@extends('layouts.front')

@section('content')


    <!--image slider start-->
    <div class="slide-one-item home-slider owl-carousel">
        @foreach ($featuredVenues as $featuredVenue)
            <div class="site-blocks-cover" style="background-image: url('{{ asset('storage/'.$featuredVenue->big_picture) }}');"
                 data-aos="fade" data-stellar-background-ratio="0.5">

                <div class="text">
                    <h2>{{ $featuredVenue->name }}</h2>
                    <p class="location"><span class="property-icon icon-room"></span> {{ $featuredVenue->address}}
                    </p>
                    <p class="mb-2"><strong>${{ number_format($featuredVenue->price_per_hour) }}</strong></p>
                    <p class="mb-0"><a href="{{ route('venue.show',[$featuredVenue->slug,$featuredVenue->id])}}"
                                       class="text-uppercase small letter-spacing-1 font-weight-bold">More Details</a>
                    </p>

                </div>
            </div>
        @endforeach
    </div>
     <!-- end of new slider-->

    <!--section search bar-->
    <div class="py-5">
        <div class="container">
            <form class="row mb-5" action="{{route('search')}}" method="GET">

                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="event_type" id="event_type" class="form-control d-block rounded-0">

                                <option value="">Venue Type</option>
                            @foreach($eventTypes as $eventType)
                                <option value="{{$eventType->id}}">{{$eventType->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <input type="number" name="people_amount" id="people_amount" min="1"
                               class="form-control d-block rounded-0" placeholder="People Amount">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="location" id="location" class="form-control d-block rounded-0">
                            <option value="">Location</option>
                                @foreach($locations as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <input type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0" value="Search">
                </div>

            </form>
    <!--endsection search bar-->

    <!--section for Inspiring venues for-->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center mb-5">
                    <div class="site-section-title">
                        <h2>Inspiring Venue For...</h2>
                    </div>
                </div>
            </div>

            <div class="row">
            @foreach($eventTypes as $eventType)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <a href="{{route('event_type',$eventType->slug)}}" class="service text-center border rounded">
                            <span class="icon flaticon-house"></span>
                            <h2 class="service-heading">{{$eventType->name}}</h2>
                            <p><span class="read-more">Learn More</span></p>
                        </a>
                    </div>
            @endforeach
            </div>
        </div>
    </div>
<!--end section for Inspiring venues for-->
    <!--section for New venues for-->
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="site-section-title">
                        <h2>New Venues for You</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
            @foreach($newestVenues as $venue)
                @if($venue->picture)
                    <div class="col-md-6 col-lg-4 mb-4">
                       <a href="{{route('venue.show', [$venue->slug, $venue->id]) }}" class="prop-entry d-block">
                            <figure>
                                <img src="{{asset('storage/'.$venue->picture)}}" alt="" class="img-fluid" style="height: 233px; width: fit-content; ">
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
                                            <strong style="font-size: 8px; margin-top: 0;">{{implode(', ',$venue->event_types()->pluck('name')->toArray())}}</strong>
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
                    @endif
            @endforeach
            </div>
        </div>
    </div>
<!--Discover spaces in section-->
    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7">
                    <div class="site-section-title text-center">
                        <h2>Discover spaces in...</h2>
                    </div>
                </div>
            </div>
            <div class="row block-13">

                <div class="nonloop-block-13 owl-carousel">
                    @foreach($locations as $location)
                        <div class="slide-item">
                            <div class="team-member text-center">
                                <a href="{{route('location', $location->slug)}}">
                                    <img src="{{asset('storage/'.$location->picture)}}" alt="" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
                                </a>
                                <div class="text p-3">
                                    <a href="{{route('location', $location->slug)}}">
                                        <h2 class="mb-2 font-weight-light text-black h4">{{$location->name}}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>

            </div>
        </div>
    </div>
<!--Discover spaces in section-->
@endsection
