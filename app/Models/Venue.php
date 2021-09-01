<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'venues';
    protected $appends = [
        'gallery',
        'main_photo',
    ];

    protected $fillable = [
        'name',
        'slug',
        'address',
        'latitude',
        'features',
        'longitude',
        'created_at',
        'updated_at',
        'deleted_at',
        'location_id',
        'description',
        'is_featured',
        'people_minimum',
        'people_maximum',
        'price_per_hour',
        'picture',
        'big_picture'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function event_types()
    {
        return $this->belongsToMany(EventType::class);
    }



}
