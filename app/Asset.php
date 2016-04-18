<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'asset_tag', 'asset_id', 'tag_id');
    }

    public function genre()
    {
        return $this->belongsToMany('App\Genre', 'asset_genre', 'asset_id', 'genre_id');
    }

    public function images()
    {
        return $this->hasOne('App\Image', 'id');
    }

}
