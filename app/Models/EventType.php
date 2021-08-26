<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventType extends Model
{
    use HasFactory;
    use SoftDeletes, HasMediaTrait;
    protected $appends = ['photo'];
    protected $fillable =['name', 'slug'];
    protected $guarded = ['id'];
    protected $table = 'event_types';

    public function venues(){
        return $this->belongsToMany(Venue::class);
    }
}
