<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    public static function filterProducts(String $json_string){
        $filterArguments=json_decode($json_string,true);
        if(sizeof($filterArguments)==0)
        {
            //$products =DB::table('products')->latest()->offset(0)->limit(5)->get();
            $products[0]["id"] =206;
            $products[0]["name"] ="\u0632\u0646\u062c\u0627\u0646";
            $products[0]["province_id"] =1378;
            $products[1]["id"] =2;
            $products[1]["name"] ="\u0632\u0646\u062c\u0627\u0646";
            $products[1]["province_id"] =1379;
            $products[2]["id"] =50;
            $products[2]["name"] ="\\u0632\\u0646\\u062c\\u0627\\u0646";
            $products[2]["province_id"] =1380;
            return json_encode($products);
        }
    }
    //
}
