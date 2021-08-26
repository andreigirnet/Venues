<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventType;
use Illuminate\Support\Str;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventTypes = [
            'Conferences',
            'Award Ceremonies',
            'The unusual',
            'Private Dining',
            'Meetings',
            'Parties'

        ];

        foreach($eventTypes as $eventType){
            EventType::create([
                'name'=>$eventType,
                'slug'=> Str::slug($eventType)
            ]);
        }
    }
}
