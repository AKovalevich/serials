<?php

namespace Share;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    static function getQuality() {
        return [
          '360' => '360',
          '480' => '480',
          '720' => '720',
        ];
    }

    static function getAvailableAssetFiles() {
        $files = Storage::disk('videos')->allFiles();
        $available_files = DB::table('videos')->lists('path');
        $result = array_diff($files, $available_files);

        return $result;
    }

    static function getAssetFilesById($asset_id) {
        $files = Storage::disk('videos')->allFiles();
        $available_files = DB::table('videos')->lists('path', 'id');
        unset($available_files[$asset_id]);
        $result = array_diff($files, $available_files);

        return $result;
    }
}
