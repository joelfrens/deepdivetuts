<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Video extends Model
{

    public function Category()
    {
        return $this->belongsTo('App\Category');
    } 

}
