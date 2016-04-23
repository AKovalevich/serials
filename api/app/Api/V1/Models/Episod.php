<?php namespace App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model {

    use \Illuminate\Auth\Authenticatable;

    protected $fillable = ["name"];

    protected $dates = ["deleted_at"];

    public static $rules = [
        "name" => "required",
    ];

//    public function prepare()
//    {
//        $this->start_date = '';
//    }

    public function video() {
        return $this->belongsToMany('Video', 'episod_video', 'episod_id', 'video_id');
    }
}
