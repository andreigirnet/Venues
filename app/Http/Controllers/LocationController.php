<?php

namespace App\Http\Controllers;
use App\Models\EventType;
use App\Models\Location;
use App\Models\Venue;


class LocationController extends Controller
{
    public function index($slug){
        $location = Location::where('slug',$slug)->firstOrFail();
        $venues = Venue::with('event_types')->where('location_id', $location->id)
        ->latest()->paginate(9);
        return view('front.location', compact('venues','location'));
    }
}
