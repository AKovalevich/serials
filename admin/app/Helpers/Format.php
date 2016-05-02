<?php

namespace App\Helpers;

class Format {
    public static function formatBytes($bytes, $precision = 2) {
        $unit = ["B", "KB", "MB", "GB"];
        $exp = floor(log($bytes, 1024)) | 0;
        return round($bytes / (pow(1024, $exp)), $precision).$unit[$exp];
    }
}