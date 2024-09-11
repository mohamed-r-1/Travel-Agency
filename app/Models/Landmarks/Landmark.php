<?php

namespace App\Models\Landmarks;

use App\Models\City\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
    use HasFactory;

    protected $table = "landmarks";
    protected $fillable = [
        "city_id",
        "name",
        "description",
        "video",
        "image",
        "address",
    ];
    public $timestamps = true;

    // landmark belongsto city
    public function city(){
        return $this->belongsTo(City::class);
    }

}
