<?php namespace App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model {

    use \Illuminate\Auth\Authenticatable;

    protected $fillable = ["name", "start_date", "end_date"];

    protected $dates = ["deleted_at"];

    public static $rules = [
        "name" => "required",
    ];

//    public function prepare()
//    {
//        $this->start_date = '';
//    }

    public function episod() {
        return $this->belongsToMany('Episod', 'episod_season', 'season_id', 'episod_id');
    }
}
