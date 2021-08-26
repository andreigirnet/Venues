<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use Illuminate\Support\Str;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'London',
            'Manchester',
            'Liverpool',
            'Birmingham'
        ];
        foreach($locations as $location){
            $slug = Str::slug($location);
            $locationObject = Location::create([
                'name' => $location,
                'slug'=> $slug
            ]);
          //  $locationObject->addMediaFromUrl(public_path('/public/images/locations/'.$slug.'.jpg'))->toMediaCollection('photo');
//            $locationObject->addMedia(public_path( '/locations/' . $slug . '.jpg' ))
//                ->toMediaCollection('photo');
            $locationObject->addMediaFromUrl(config('app.url') . '/locations/' . $slug . '.jpg' )
                ->toMediaCollection('photo');
        }
    }
}
