<?php

namespace Share;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function tags()
    {
        return $this->belongsToMany('Share\Tag', 'asset_tag', 'asset_id', 'tag_id');
    }

    public function genre()
    {
        return $this->belongsToMany('Share\Genre', 'asset_genre', 'asset_id', 'genre_id');
    }

    public function images()
    {
        return $this->hasOne('Share\Image', 'id');
    }

    public function slider()
    {
        return $this->hasOne('Share\Slider', 'id');
    }

}
