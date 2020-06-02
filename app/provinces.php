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
        $prov=DB::table('provinces');
        if(isset( $province["id"] )){
            $id=$province["id"];
            $prov =$prov->where('id', '=', $id);
        }
        else
        $prov =$prov->where('id', '=', 20);
        
        $previousProvince =$prov->first();
        $neighbours =[
            'previousNeighbour' => $previousProvince
        ];
        return $neighbours;
    }
    //
}
