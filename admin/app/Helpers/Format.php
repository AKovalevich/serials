<?php

namespace App\Helpers;

class Format {
    public static function formatBytes($bytes, $precision = 2) {
        $unit = array('B','KB','MB','GB','TB','PB','EB');

        return @round(
                $bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision
            ) . ' ' . $unit[$i];
    }
}