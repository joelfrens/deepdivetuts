<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article_images extends Model
{	

	protected $fillable = [
    	'article_id', 'image'
    ];

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
}