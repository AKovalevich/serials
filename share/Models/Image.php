<?php

namespace Share;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    static function getTypes() {
        return [
          'slide' => 'Slide',
          'preview' => 'Preview',
          'poster' => 'Poster',
          'background' => 'Background',
        ];
    }
}
