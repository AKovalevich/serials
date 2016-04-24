<?php

namespace Share;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function images()
    {
        return $this->hasOne('Share\Image', 'id', 'image_id');
    }

    public function videos()
    {
        return $this->hasOne('Share\Video', 'id', 'file_id');
    }

    public function assets()
    {
        return $this->belongsTo('Share\Asset', 'asset_id', 'id');
    }

    public function asstetTitle()
    {
        $asset = Asset::find($this->asset_id);
        return ucfirst($asset->title);
    }
}
