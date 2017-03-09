<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
    	'name', 'id'
    ];

    public function article()
    {
    	return $this->belongsToMany(Article::class);
    }

}