<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Illuminate\Support\Str;
class LocationsController extends Controller
{


    public function index()
    {

        $locations = Location::all();

        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {

        return view('admin.locations.create');
    }

    public function store(LocationRequest $request)
    {
        $picture = $request->file('picture');
        $path = null;
        if($picture){
            $path = $picture->store('public/locations');
            $path = Str::replace('public','', $path);
        }
        $location = Location::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'picture'=>$path
        ]);
        return redirect(route('locations.index'));
    }

    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(LocationRequest $request, Location $location)
    {
        $picture = $request->file('picture');
        if($picture){
            $path = $picture->store('public/locations');
            $path = Str::replace('public','',$path);
            $location->picture = $path;
        }
        $location->name = $request->input('name');
        $location->slug = $request->input('slug');
        $location->save();
        return redirect(route('locations.index'))->with('success','Location updated');
    }

    public function show(Location $location)
    {
        return view('admin.locations.show', compact('location'));
    }

    public function destroy($id)
    {

        $l = Location::findOrFail($id);
        $l->delete();

        return redirect(route('locations.index'))->with('success','Location deleted');
    }

}
