<?php

namespace App\Http\Controllers;
use App\Http\Requests\VenueRequest;
use App\Models\EventType;
use App\Models\Location;
use App\Models\Venue;
use Illuminate\Support\Str;

class ClientVenueController extends Controller
{
    public function create()
    {
        $locations = Location::all();
        $event_types = EventType::all();
        return view('front.user_create_venue', compact('locations', 'event_types'));
    }

    public function store(VenueRequest $request)
    {
        $picture = $request->file('picture');
        $path = null;
        if($picture){
            $path = $picture->store('public/venues');
            $path = Str::replace('public','',$path);
        }
        $event_type_id = $request->input('event_id');
        $venue = Venue::create([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'address'=>$request->input('address'),
            'people_minimum'=>$request->input('people_minimum'),
            'people_maximum'=>$request->input('people_maximum'),
            'features'=>$request->input('features'),
            'price_per_hour'=>$request->input('price_per_hour'),
            'description'=>$request->input('description'),
            'location_id'=>$request->input('location_id'),
            'user_id'=> auth()->user()->id,
            'picture'=>$path
        ]);
        $venue->event_types()->attach($event_type_id);
        $venue->save();

        return redirect(url('/'))->with('success','Venues has been created');
    }

    public function edit(Venue $venue)
    {
        $locations = Location::all();
        $event_types = EventType::all();
        return view('admin.venues.edit', compact('locations', 'event_types', 'venue'));
    }

    public function update(VenueRequest $request, Venue $venue)
    {
        $picture = $request->file('picture');
        $path = null;
        if($picture){
            $path = $picture->store('public/venues');
            $path = Str::replace('public','',$path);
        }

        $event_type_id = $request->input('event_id');
        $input = ([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'address'=>$request->input('address'),
            'people_minimum'=>$request->input('people_minimum'),
            'people_maximum'=>$request->input('people_maximum'),
            'features'=>$request->input('features'),
            'price_per_hour'=>$request->input('price_per_hour'),
            'description'=>$request->input('description'),
            'location_id'=>$request->input('location_id'),
            'picture'=>$path,
        ]);
        $venue->event_types()->sync($event_type_id);
        $venue->update($input);

        return redirect(route('venues.index'))->with('success','Venue updated');
    }

    public function show(Venue $venue)
    {
        return view('admin.venues.show', compact('venue'));
    }

    public function destroy($id)
    {
        $event = Venue::findOrFail($id);
        $event->delete();
        return redirect(route('venues.index'))->with('success','Venue deleted');
    }
}
