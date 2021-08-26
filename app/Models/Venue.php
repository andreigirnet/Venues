<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Venue extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    use HasFactory;
    use InteractsWithMedia;
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
    ];
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
        $this->addMediaConversion('big_thumb')->width(500)->height(500);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function event_types()
    {
        return $this->belongsToMany(EventType::class);
    }

    public function getMainPhotoAttribute()
    {
        $file = $this->getMedia('main_photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getGalleryAttribute()
    {
        $files = $this->getMedia('gallery');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
        });

        return $files;
    }
}
