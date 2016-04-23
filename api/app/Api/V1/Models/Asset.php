<?php namespace App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model {

    use \Illuminate\Auth\Authenticatable;

    protected $fillable = ["description", "plot", "start_date", "end_date", 'body', 'name'];

    protected $dates = ["deleted_at"];

    public $table = "asset";

    public static $rules = [
        "name" => "required",
    ];

//    public function prepare()
//    {
//        $this->created_by = '';
//    }

    public function seasons() {
        return $this->belongsToMany('Season', 'asset_season', 'asset_id', 'season_id');
    }
}
