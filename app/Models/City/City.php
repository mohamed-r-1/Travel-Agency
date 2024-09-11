<?php

namespace App\Models\City;

use App\Models\Country\Country;
use App\Models\Landmarks\Landmark;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    use HasFactory;

    protected $table = "cities";

    protected $fillable = [

        "name",
        "image",
        "price",
        "description",
        "num_days",
        "country_id",
        "video",

    ];

    public $timestamps = true;

    // city belogsTo country
    public function country(){
        return $this->belongsTo(Country::class);
    }

    // City Has Many Landmark 
    public function landmarks(){
        return $this->hasMany(Landmark::class);
    }

}
