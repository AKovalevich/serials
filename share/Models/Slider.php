<?php

namespace Share;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function slides()
    {
        return $this->belongsToMany('Share\Image', 'slider_image', 'slider_id', 'image_id');
    }

    static function getTypes()
    {
        return [
          'asset' => 'TV show',
          'site' => 'Site',
        ];
    }
}
