<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class provinces extends Model
{
    public static function getProvince($province_id){
        return json_encode(DB::table('provinces')->where('id', '=', $province_id)->first());
    }
    public static function getNeighbourProvince($province_json){
        $province =json_decode($province_json,true);
        if(isset( $province["id"] ))
        $id=$province["id"];
        else
        $id=25;
        $previousProvince =DB::table('provinces')->where('id', '=', $id-1)->first();
        $nextProvince =DB::table('provinces')->where('id', '=', $id+1)->first();
        $neighbours =[
            'previousNeighbour' => $previousProvince,
            'nextNeighbour' => $nextProvince
        ];
        return $neighbours;
    }
    //
}
