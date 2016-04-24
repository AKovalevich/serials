<?php

namespace Share;

use DB;
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

    public function episodesCount()
    {
        $episodes = DB::table('episodes')
          ->select('id')
          ->where('asset_id', '=', $this->id)
          ->count();

        return $episodes;
    }

    public function seasonsCount()
    {
        $seasons = DB::table('episodes')
          ->select('season_number')
          ->where('asset_id', '=', $this->id)
          ->distinct()
          ->get();

        return count($seasons);
    }

}
