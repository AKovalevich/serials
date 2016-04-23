<?php

namespace Share;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    static function getQuality() {
        return [
          '360' => '360',
          '480' => '480',
          '720' => '720',
        ];
    }
}
