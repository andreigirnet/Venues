<?php

namespace Database\Seeders;
use App\Models\EventType;
use App\Models\Location;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $locations = Location::all();
       $eventTypes = EventType::all();
        for($i=1; $i<=4; $i++) {
           $venue = Venue::factory()->create([
                'latitude' => random_int(20,20),
                'longitude' => random_int(20,20),
                'people_minimum'=>1,
                'people_maximum'=>random_int(5,100),
                'price_per_hour'=>random_int(100,1000),
                'is_featured'=>random_int(0,1),
                'location_id'=> $locations->random(1,4)->first()->id,
            ]);
           $venue->event_types()->attach($eventTypes->random(1,6)->first()->id);
            $venue->addMediaFromUrl(config('app.url') . '/public/images/hero_bg_' . $venue->id . '.jpg' )
                ->toMediaCollection('main_photo');
        }
    }
}
