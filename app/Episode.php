<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function images()
    {
        return $this->hasOne('App\Image', 'id', 'image_id');
    }

    public function videos()
    {
        return $this->hasOne('App\Video', 'id', 'file_id');
    }

    public function assets()
    {
        return $this->belongsTo('App\Asset', 'asset_id', 'id');
    }
}
