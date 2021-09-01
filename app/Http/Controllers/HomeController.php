<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use App\Models\Location;
use App\Models\Venue;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
//        $featuredVenues = [
//            [
//            'hero_image' => '/public/images/hero_bg_1.jpg',
//            'name'=>'85 S Lucerne Blvd',
//            'address'=>'Los Angeles CA 9005',
//            'price'=>'$ 2,250,000',
//            'link'=>'$'
//        ],
//        [
//            'hero_image' => '/public/images/hero_bg_3.jpg',
//            'name'=>'85 S St. Bernard Blvd',
//            'address'=>'Los Angeles BS 9002',
//            'price'=>'$ 3,350,000',
//            'link'=>'$'
//        ],
//        [
//            'hero_image' => '/public/images/hero_bg_2.jpg',
//            'name'=>'85 S St. Bernard Blvd',
//            'address'=>'Florida BS 8002',
//            'price'=>'$ 7,550,000',
//            'link'=>'$'
//        ],
//        [
//            'hero_image' => '/public/images/hero_bg_4.jpg',
//            'name'=>'85 S St. Bernard Blvd',
//            'address'=>'St. Monique BS 3002',
//            'price'=>'$ 5,380,000',
//            'link'=>'$'
//        ]
//        ];
        $featuredVenues = Venue::where('is_featured',1)->get();

        $eventTypes = EventType::orderBy('id', 'desc')->take(6)->get();
        $locations = Location::all();
 //       $flocation = Location::first()->getFirstMediaPath('photo');
//        dd($flocation);
        $newestVenues = Venue::with('event_types')->latest()->take(6)->get();
        return view('front.home', compact('featuredVenues','eventTypes','locations','newestVenues'));
    }
}
