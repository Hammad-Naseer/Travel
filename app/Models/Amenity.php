<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Amenity extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getAlllAmenities(){
        $result =DB::table('amenities')->select('*')->get()->toArray();
        return $result;
    }
}
