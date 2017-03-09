<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model 
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
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
    	'title', 'content', 'active', 'scheduled_on', 'xcoordinate', 'ycoordinate', 'category_id', 'meta_keywords', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article_images()
    {
        return $this->hasMany(article_images::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
    
}