<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Location extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes, HasMediaTrait;
    use InteractsWithMedia;

    protected $appends = [
        'photo'
    ];
    protected $fillable = [
        'name',
        'slug',
        'picture',
    ];
    protected $guarded = ['id'];
    protected $table = 'locations';

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    public function venues(){
        return $this->hasMany(Venue::class,'location_id','id');
    }
    public function getPhotoAttribute(){
        $file = $this->getMedia('photo')->last();
        if($file){
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }
        return $file;
    }
}
