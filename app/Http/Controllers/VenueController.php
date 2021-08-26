<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function show($slug, $id){
        $venue = Venue::with('event_types')->where('slug', $slug)->where('id',$id)->firstOrFail();
        $relatedVenues = Venue::with('event_types')->where('location_id', $venue->location->id)->where('id','!=',$venue->id)->take(3)->get();
        return view('front.venue',compact('venue','relatedVenues'));
    }
}
