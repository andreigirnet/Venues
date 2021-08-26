@extends('layouts.front')
@section('content')
    <div class="site-blocks-cover overlay" style="background-image: url({{$venue->getFirstMediaUrl('main_photo')}})" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                    <h1 class="mb-2">{{$venue->name}}</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{$venue->price_per_hour}}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" style="margin-top: -150px;">
                    <div class="mb-5">
                        <div class="slide-one-item home-slider owl-carousel">
                            <div><img src="{{$venue->getFirstMediaUrl('main_photo','big_thumb')}}" alt="{{$venue->name}}"
                                      class="img-fluid"></div>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong class="text-success h1 mb-3">${{$venue->price_per_hour}}</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Event Types</span>
                                <strong class="d-block">{{implode(', ',$venue->event_types->pluck('name')->toArray() )}}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Location</span>
                                <strong class="d-block">{{$venue->location->name}}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">People amount</span>
                                <strong class="d-block">{{$venue->people_minimum}} - {{$venue->people_maximum}}</strong>
                            </div>
                        </div>
                        <h2 class="h4 text-black">More Info</h2>
                        <p>{{$venue->description}}</p>

                        <div class="row mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Property Gallery</h2>
                            </div>

                                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <a href="{{asset('/public/images/img_1.jpg')}}" class="image-popup gal-item">
                                        <img src="{{asset('/public/images/img_1.jpg')}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="{{asset('/public/images/img_1.jpg')}}" class="image-popup gal-item">
                                    <img src="{{asset('/public/images/img_1.jpg')}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="{{asset('/public/images/img_1.jpg')}}" class="image-popup gal-item">
                                    <img src="{{asset('/public/images/img_1.jpg')}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="{{asset('/public/images/img_2.jpg')}}" class="image-popup gal-item">
                                    <img src="{{asset('/public/images/img_2.jpg')}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="{{asset('/public/images/img_3.jpg')}}" class="image-popup gal-item">
                                    <img src="{{asset('/public/images/img_3.jpg')}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="{{asset('/public/images/img_4.jpg')}}" class="image-popup gal-item">
                                    <img src="{{asset('/public/images/img_4.jpg')}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="{{asset('/public/images/img_5.jpg')}}" class="image-popup gal-item">
                                    <img src="{{asset('/public/images/img_5.jpg')}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="{{asset('/public/images/img_6.jpg')}}" class="image-popup gal-item">
                                    <img src="{{asset('/public/images/img_6.jpg')}}" alt="" class="img-fluid">
                                </a>
                            </div>

                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <div style="width: 100%; height: 400px" id="address-map"></div>

                                <script>

                                </script>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pl-md-5">

                    <div class="bg-white widget border rounded">

                        <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                        <form action="" class="form-contact-agent">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
                            </div>
                        </form>
                    </div>

                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis ducimus quis. Illo, quisquam, veritatis.</p>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>Related Properties</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
            @foreach($relatedVenues as $venues)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <a href="{{route('venue.show', [$venue->slug, $venue->id]) }}" class="prop-entry d-block">
                            <figure>
                                <img src="{{$venue->getFirstMediaUrl('main_photo','big_thumb')}}" alt="" class="img-fluid" style="height: 233px; width: fit-content; ">
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
                                            <strong style="font-size: 8px; margin-top: 0px;">{{implode(', ',$venue->event_types()->pluck('name')->toArray())}}</strong>
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
        </div>
        @endsection

