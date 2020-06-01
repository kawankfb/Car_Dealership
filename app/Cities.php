<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cities extends Model
{
    public static function citiesOfProvince($province_id){
        return DB::table('cities')->where('province_id', '=', $province_id)->get();
        
    }
    //
}
