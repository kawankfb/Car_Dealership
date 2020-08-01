<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\IsJson;

class Unchecked_Products extends Model
{
    protected $fillable = [
        'price',
        'title',
        'explanation',
        'distance',
        'damage',
        'production_date',
        'color',
        'manufacturer',
        'model',
        'user_id',
        'fuel_type',
        'province',
        'city',
        'car_type'
    ];
    //
    public static function insertProduct($json_string){
            $product_json=json_decode($json_string,true);
            $id =DB::table('unchecked_products')->insertGetId(
                [
                    'price'             => $product_json["price"],
                    'title'             => $product_json["title"],
                    'explanation'       => $product_json["explanation"],
                    'distance'          => $product_json["distance"],
                    'damage'            => $product_json["damage"],
                    'production_date'   => $product_json["production_date"],
                    'color'             => $product_json["color"],
                    'manufacturer'      => $product_json["manufacturer"],
                    'model'             => $product_json["model"],
                    'user_id'           => $product_json["user_id"],
                    'fuel_type'         => $product_json["fuel_type"],
                    'province'          => $product_json["province"],
                    'city'              => $product_json["city"],
                    'car_type'          => $product_json["car_type"]
                 ]
            );
                return [ 'id' => $id];
        
    }
}
